<?php namespace Evermade\Swiss;

/**
 * a simple function to help dry out views of checking array indexes and object properties
 * @param  [type] $key   [description]
 * @param  array  $array [description]
 * @return [type]        [description]
 */
function getFrom($key=null, $array=array()) {

    // if we have an object
    if(is_object($array) && isset($array->{$key})) {
        return $array->{$key};
    }

    // else we have an array
    if(is_array($array) && isset($array[$key])) return $array[$key];

    return null;
}

/**
 * a little function to return html from a template, whilst you pass in data as a reference, for example partials
 * @param  [type] $name  [template name]
 * @param  [type] &$data [data pass in by reference to template]
 * @return [type]        [html]
 */
function template($name = null, $data=null, $dir='templates') {

    if(!file_exists((get_template_directory().'/'.$dir.'/'.$name))) return null;

    ob_start();
    include(get_template_directory().'/'.$dir.'/'.$name);
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
}

function get_image_sizes($size = '') {

    global $_wp_additional_image_sizes;

        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();

        // Create the full array with sizes and crop info
        foreach( $get_intermediate_image_sizes as $_size ) {

                if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

                        $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
                        $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
                        $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

                } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

                        $sizes[ $_size ] = array(
                                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
                        );

                }

        }

        // Get only 1 size if found
        if ( $size ) {

                if( isset( $sizes[ $size ] ) ) {
                        return $sizes[ $size ];
                } else {
                        return false;
                }

        }

        return $sizes;
}

function default_img($size='thumbnail', $text='img') {

    $sizes = \Evermade\Swiss\get_image_sizes();

    if(isset($sizes[$size])) {
        return sprintf('https://fakeimg.pl/%sx%s/666/fff/?text=%s', $sizes[$size]['width'], $sizes[$size]['height'], $text);
    }

    return sprintf('https://fakeimg.pl/%sx%s/666/fff/?text=%s', 850, 850, $text);
}

function feature_image_url($size='medium-large', $post=null) {

    //if we have no post then lets bring in the global post
    if(empty($post)){
        global $post;
    }

    //if we still dont have a post, lets bail out
    if(empty($post)){
        return null;
    }

    $img = \wp_get_attachment_image_src(get_post_thumbnail_id($post), $size)[0];

    if(empty($img)) {
        $img = \Evermade\Swiss\default_img($size, 'img');
    }

    return $img;
}

function is_dev() {
    return (getenv('APP_ENV') == 'production')? false : true;
}

function debug($msg=null, $style='php') {
    if(\Evermade\Swiss\is_dev()) {

        if($style == 'php'){
            echo "<pre>"; print_r($msg); echo "</pre>";
        }

        if($style == 'js'){
            echo "<script>console.log(".json_encode($msg).");</script>";
        }

        return true;
    }
    return false;
}

/**
 * a generic sprintf for handling both arrays and single strings for quick if templating
 * @param  string $str   [description]
 * @param  [type] $input [description]
 * @return [type]        [description]
 */
function sprint($str='', $input) {

    //if an array
    if(is_array($input) && !empty($input)) {

        $broken = false;
        $data = array();

        foreach($input as $field) {
            if(!empty($field)) {
                $data[] = $field;
            }
            else {
                $broken = true;
                break;
            }
        }

        if(!empty($data) && !$broken) {
            return vsprintf($str, $data);
        }
    }
    elseif(!empty($input)) {
        //else just a single sprint
        return sprintf($str, $input);
    }

    return null;
}

/**
 * [excerpt description]
 * @param  [type]  $str   [description]
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
function excerpt($str, $limit = 255) {
    $strlen = strlen($str);
    return ($strlen>=$limit) ? substr($str, 0, $limit)."&hellip;" : $str;
}

function share_page() {

    $html = null;
    $template = get_template_directory().'/templates/_share-page.php';

    if(is_readable($template)) {
        $services = array(
            'facebook'=> array(
                'url'=>'',
                'icon' => 'fa fa-facebook'
            ),
            'twitter'=> array(
                'url'=>'',
                'icon' => 'fa fa-twitter'
            ),
            'linkedin'=> array(
                'url'=>'',
                'icon' => 'fa fa-linkedin'
            ),
            'google'=> array(
                'url'=>'',
                'icon' => 'fa fa-google'
            ),
            'email'=> array(
                'url'=>'',
                'icon' => 'fa fa-envelope'
            )
        );

        foreach($services as $key => $value) {
             $services[$key]['url'] = \Evermade\Swiss\share_link($key);
        }

        ob_start();
        include(get_template_directory().'/templates/_share-page.php');
        $html = ob_get_contents();
        ob_clean();

    }

    return $html;
}

function share_link($type='facebook', $url=null, $title='') {

    $data = array();
    $urls = array(
        'facebook'  => 'http://www.facebook.com/sharer/sharer.php?u=%s',
        'twitter'   => 'http://twitter.com/share?url=%s&text=%s',
        'google'    => 'https://plus.google.com/share?url=%s',
        'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s&summary=%s&source=%s',
        'email'     => 'mailto:?subject=%s&body=%s'
        );

    if(array_key_exists($type, $urls)) {
        $data['url'] = (empty($url))? \Evermade\Swiss\cur_page_url() : $url;

        if($type=='twitter') {
            $data['title'] = (empty($title))? get_the_title() : $title;
        }

        if($type=='email') {
            $data['body'] = (empty($title))? get_the_title() : $title;

            array_unshift($data, $data['body']);
        }

        if($type=='linkedin') {
            $data['title'] = (empty($title))? get_the_title() : $title;
            $data['summary'] = get_the_excerpt();
            $data['source'] = get_bloginfo('name');
        }

        return vsprintf($urls[$type], $data);
    }

    return null;
}

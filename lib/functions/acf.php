<?php namespace Swiss\Acf;

/**
 * get the post blocks by a specific type, by default we get the page type of blocks
 * this way it allows different block groups to be created and not pollute the main page block space
 * for example we could have the following post types each with thier own block group (page, story etc)
 * @param  string $name [description]
 * @return [type]       [description]
 */
function postBlocks($name='page') {

    //lets check is ACF available
    if (!\Swiss\Acf\isAcfActive() || empty($name)) return false;

    //loop the blocks fields
    while(has_sub_field($name.'_blocks')) {
        $template = get_template_directory().'/lib/blocks/'.$name.'/'.str_replace(' ', '_', strtolower(get_row_layout())).'/index.php';
        if(!file_exists($template)) {
            \Swiss\debug($template ." - Template not found");
            continue;
        }

        //to help debugging
        echo '<!-- ('.basename(dirname($template)).') block -->';
        include($template);
    }

    return true;
}

/**
 * to fetch and return a url from a ACF image array
 *
 * @param string $size
 * @param [type] $key
 * @return void
 */
function getImageUrl($size='large', $key=null) {

    if(empty($key) || empty($size)) return null;

    // allows us to pass an array or a key to fetch from current post
    $image = (is_string($key))? get_field($key) : $key;

    // do we have our image
    if(!empty($image) && is_array($image)){

        // special case for originals as they are outside the sizes array
        if($size == 'original' && isset($image['url'])){
            return $image['url'];
        }
        elseif(isset($image['sizes'][$size])) {
            return $image['sizes'][$size];
        }
    }

    return null;
}

/**
 * to return an image tag from a ACF image array
 *
 * @param string $size
 * @param [type] $key
 * @param string $class
 * @return void
 */
function getImage($size='medium-large', $key=null, $class=''){

    $image_url = Swiss\Acf\getImageUrl($size, $key);

    if($image_url){
        return sprintf('<img src="%s" alt="image" class="%s" %s>', $image_url, $class);
    }

    return null;
}

function getOption($group_fields) {

    if(empty($group_fields) || !is_array($group_fields) || !\Swiss\Acf\isAcfActive()) {
        return false;
    }

    $group_data = array();

    foreach($group_fields as $field) {
        $group_data[$field] = \get_field($field, 'option');
    }

    return $group_data;
}

function isAcfActive() {
    return (function_exists('has_sub_field'))? true : false;
}

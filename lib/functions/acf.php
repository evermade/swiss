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
        $template = get_template_directory().'/lib/blocks/'.$name.'/'.str_replace(' ', '-', strtolower(get_row_layout())).'/run.php';
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

/**
 * Register our local block field groups via PHP to help distribute and share blocks amognst projects
 *
 * @return void
 */
function registerLocalBlockFieldGroups(){

    // if we have ACF enabled
    if( function_exists('acf_add_local_field_group') ){

        // an array to hold our layouts
        $layouts = array();

        // lets loop and build our acf layouts array
        // @todo: this could be moved per block if it even needs to register fields
        foreach(glob(get_template_directory().'/lib/blocks/page/*/includes/acf.php') as $layout){
            $layouts[] = include_once ($layout);
        }

        // lets loop and include the block init files, could be merged with the above, moving on
        foreach(glob(get_template_directory().'/lib/blocks/page/*/init.php') as $blockInit){
            include_once ($blockInit);
        }

        if(empty($layouts)) return false;

        /**
         * Register our fields y'all
         * https://www.advancedcustomfields.com/resources/register-fields-via-php/
         */
        acf_add_local_field_group(array (
            'key' => 'group_54ddebcd1dfe7',
            'title' => 'Page Blocks!',
            'fields' => array (
                array (
                    'key' => 'field_54ddee97933e5',
                    'label' => 'Blocks',
                    'name' => 'page_blocks',
                    'type' => 'flexible_content',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'button_label' => 'Add Block',
                    'min' => '',
                    'max' => '',
                    'layouts' => $layouts,
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
            'modified' => 1516178549,
        ));

        return true;
    }

    return false;
}

<?php namespace Swiss\Acf;

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
        if($size == 'original'){
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

    if(empty($group_fields) || !is_array($group_fields) || !\Swiss\is_acf_active()) {
        return false;
    }

    $group_data = array();

    foreach($group_fields as $field) {
        $group_data[$field] = \get_field($field, 'option');
    }

    return $group_data;
}

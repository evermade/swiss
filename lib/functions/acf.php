<?php namespace Swiss\Acf;

function get_image($size='large', $key, $type='img', $class=null) {

    // allows us to pass an array or a key to fetch
    $image = (is_string($key))? get_field($key) : $key;

    if(!empty($image) && isset($image['sizes'][$size])){

        // if an image is requested do so, else return a url
        if($type == 'img') {
            return sprintf('<img src="%s" alt="%s" class="%s" %s>', $image['sizes'][$size], $image['alt'], $class);
        }
        else {
            return $image['sizes'][$size];
        }

    }

    return null;
}


function get_image_url($key, $size='large') {
    $image = get_field($key);

    if(!empty($image) && isset($image['sizes'][$size])) {
        return $image['sizes'][$size];
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
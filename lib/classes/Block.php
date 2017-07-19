<?php namespace Swiss;

/**
 * Block class for keeping data together whilst looping many blocks within a page, and maybe ajax in future
 */
class Block extends BlockHelper {

    var $fields = array(); //for ACF fields only
    var $data = array(); //for custom data, public accesible
    var $repeaters = array(); //for ACF repeater fields
    var $css = array(); //for css styles

    public function __construct($data=array()) {
        if(!empty($data)) {
            $this->fields = $data;
        }
    }

    /**
     * [get_fields we use get_sub_field be default is we are currently in a loop of a post, so we are getting sub fields of the site blocks object]
     * @param  array   $fields [description]
     * @param  boolean $parent [description]
     * @return [type]          [description]
     */
    public function get_fields($fields=array(), $parent=true) {

        if(!is_array($fields)) return false;

        foreach($fields as $field) {
            if($parent) {
                $this->fields[$field] = get_sub_field($field);
            }
            else {
                $this->fields[$field] = get_field($field);
            }
        }
        return $this->fields;
    }

    /**
     * [set description]
     * @param [type] $key   [description]
     * @param [type] $value [description]
     */
    public function set($key, $value, $array = 'data') {
        if(!isset($this->{$array})) return false;

        return $this->{$array}[$key] = $value;
    }

    //
    /**
     * [get get our data field, you can pass in data or fields to grab specific array data]
     * @param  [type] $key   [description]
     * @param  string $array [description]
     * @return [type]        [description]
     */
    public function get($key, $array='fields') {
        if(!isset($this->{$array}[$key])) return null;

        return $this->{$array}[$key];
    }

    /**
     * [get_repeater_field get and setup repeater fields]
     * @param  array  $repeaters [description]
     * @return [type]            [description]
     */
    public function get_repeater_field($repeaters= array(), $sub=true) {

        if(!is_array($repeaters)) return false;

        foreach($repeaters as $repeater) {

            // if in main loop and loop of flexible content
            if($sub) {
                $this->repeaters[$repeater] = get_sub_field($repeater);
            }
            else {
                $this->repeaters[$repeater] = get_field($repeater);
            }

            $this->data[$repeater.'_total'] = sizeof($this->repeaters[$repeater]);
        }

        return true;
    }
}

class BlockHelper {

    /**
     * a method to build css classes, inline styles for elements
     * @param [type] $css [description]
     * @param [type] $key [description]
     */
    public function addCss($css=null, $key=null) {
        if(empty($css) || empty($key)) return null;

        if(!isset($this->css[$key])) {
            $this->css[$key] = null;
        }

        $this->css[$key] .= ' '.$css;

        return true;
    }

    /**
     * the getter method for the results of the addCss method
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function getCss($key=null) {
        return $this->get($key, 'css');
    }

    /**
     * a wrapper function addCss specifically for background images
     * @param [type] $field [description]
     */
    public function set_background_image($field, $size='large') {
        if(isset($this->fields[$field]['sizes'][$size])) {
            return $this->set($field, 'background-image:url('.$this->fields[$field]['sizes'][$size].');', 'css');
        }

        return false;
    }

    public function get_background_image($field) {
        return $this->get($field, 'css');
    }
}
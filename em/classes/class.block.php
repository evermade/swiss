<?php

/**
 * Block class for keeping data together whilst looping many blocks within a page, and maybe ajax in future
 */
class Block extends BlockHelper{

	var $fields = array(); //for ACF fields only
	var $data = array(); //for custom data, public accesible
	var $repeater_blocks = array(); //for ACF repeater fields
	var $styles = array(); //for generic styling such as background images, css classes etc

	public function __construct(){
	}

	//we use get_sub_field be default is we are currently in a loop of a post, so we are getting sub fields of the site blocks object
	public function get_fields($parent=true){
		foreach($this->fields as $field){
			if($parent){
				$this->fields[$field] = get_sub_field($field);
			}
			else {
				$this->fields[$field] = get_field($field);
			}
		}
		return $this->fields;
	}

	//set our data field
	public function set($key, $value){
		return $this->data[$key] = $value;
	}

	//set acf fields
	public function set_fields($fields = array()){
		return $this->fields = $fields;
	}

	public function setup_repeater_field($name=null){
		$this->repeater_blocks = get_sub_field($name);
		$this->data['total'] = sizeof($this->repeater_blocks);
		$this->setup_grid_columns();
		return true;
	}

	public function set_background_image($url=null, $name='background'){
		if(!empty($url)){
			$this->styles[$name] = 'background-image:url('.$url.'); background-size:cover;';
		}
		else {
			$this->styles[$name] = null;
		}
		return $this->styles[$name];
	}

	public function setup_background_image($field){
		if(is_array($this->fields[$field])){
			return $this->set_background_image($this->fields[$field]['sizes']['large'], $field);
		}
		return $this->styles[$field] = null;
	}

	public function setup_grid_columns(){
		$this->data['grid_columns'] = 'col-md-12'; //default
		if($this->data['total'] > 1){
			$this->data['grid_columns'] = 'col-sm-'.em::number_of_columns($this->data['total']);
		}
		return true;
	}

	public function addClass($class, $key){
		if(!isset($this->classes[$key])){
			$this->classes[$key] = array();
		}
		return array_push($this->classes[$key], $class);
	}

	public function displayClasses($key){
		if(!is_array($this->classes[$key])) return null;
		return " ".implode(" ", $this->classes[$key]);
	}

}

class BlockHelper {

}
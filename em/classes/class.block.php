<?php

/**
 * Block class for keeping data together whilst looping many blocks within a page, and maybe ajax in future
 */
class Block extends BlockHelper{

	var $fields = array(); //for ACF fields only
	var $data = array(); //for custom data, public accesible
	var $repeaters = array(); //for ACF repeater fields
	var $styles = array(); //for generic styling such as background images, css classes etc

	public function __construct(){
	}

	//we use get_sub_field be default is we are currently in a loop of a post, so we are getting sub fields of the site blocks object
	public function get_fields($fields=array(), $parent=true){

		if(!is_array($fields)) return false;

		$this->fields = $fields;

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

	//get our data field
	public function get($key){
		if(!isset($this->data[$key])){
			return null;
		}
		return $this->data[$key];
	}

	public function get_repeater_field($repeaters= array()){

		if(!is_array($repeaters)) return false;

		foreach($repeaters as $repeater){
			$this->repeaters[$repeater] = get_sub_field($repeater);
			$this->data[$repeater.'_total'] = sizeof($this->repeaters[$repeater]);
			$this->setup_grid_columns($repeater);
		}
		
		return true;
	}

}

class BlockHelper {

	public function set_background_image($url=null, $name='background'){
		if(!empty($url)){
			$this->styles[$name] = 'background-image:url('.$url.');';
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

	public function setup_grid_columns($repeater=null){
		$this->data[$repeater.'_grid_columns'] = 'col-xs-12'; //default

		if(!isset($this->data[$repeater.'_total'])){
			return $this->data[$repeater.'_grid_columns'];
		}

		if($this->data[$repeater.'_total'] > 1){
			$this->data[$repeater.'_grid_columns'] .= ' col-md-'.em::number_of_columns($this->data[$repeater.'_total']);
		}

		return $this->data[$repeater.'_grid_columns'];
	}

	//some methods for helping with css stuff

	public function addClass($class, $key){
		if(!empty($class)) return null;

		if(!isset($this->classes[$key]) || !is_array($this->classes[$key])){
			$this->classes[$key] = array();
		}
		return array_push($this->classes[$key], $class);
	}

	public function displayClasses($key){
		if(!is_array($this->classes[$key]) || empty($this->classes[$key])) return null;
		return " ".implode(" ", $this->classes[$key]);
	}

}
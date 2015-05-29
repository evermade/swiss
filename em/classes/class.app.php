<?php

class app {
	protected $data = array();

	public function __construct(){

		//lets set our social media links by default
		$this->set_options(array('opt_social_media_facebook', 'opt_social_media_twitter', 'opt_social_media_google_plus'));
	}

	public function set_options($options = array()){
		if(empty($options) || !is_array($options)){
			return false;
		}

		$links = em::acf_options($options);
		foreach($links as $k => $v){
			$this->data[$k] = $v;
		}

		return true;
	}

	//a setter method for our app data
	public function set($key, $value){
		if(isset($this->data) && is_array($this->data)){
			return $this->data[$key] = $value;
		}
		return false;
	}

	//a getter method, we can use data, options
	public function get($key){
		if(!isset($this->data[$key])){
			return null;
		}
		return $this->data[$key];
	}
}
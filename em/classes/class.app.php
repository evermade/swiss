<?php

/**
 * A generic App class
 */
class app {
	protected $data = array();

	public function __construct(){

		//lets set our social media links by default
		$this->set_options(array('opt_social_media_facebook', 'opt_social_media_twitter', 'opt_social_media_google_plus'));
	}

	/**
	 * [set_options description]
	 * @param array $options [description]
	 */
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

	/**
	 * [set description]
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	public function set($key, $value){
		if(isset($this->data) && is_array($this->data)){
			return $this->data[$key] = $value;
		}
		return false;
	}

	/**
	 * [get description]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function get($key){
		if(!isset($this->data[$key])){
			return null;
		}
		return $this->data[$key];
	}
}
<?php
/**
 * helper class with some static methods for encapsualtion to help us out
 */
class em {

	/**
	 * [blocks description]
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	static public function blocks($name='blocks'){

		//lets check is ACF available
		if (!em::is_acf_active()) return false;

		//loop the blocks fields		
		while(has_sub_field($name)){
			$template = get_template_directory().'/em/'.$name.'/'.em::clean_template_name(get_row_layout()).'/index.php';
			if(!file_exists($template)){
				Helper::log($template ." - Template not found");
				continue;
			}
			include($template);
		}
	}

	/**
	 * [clean_template_name description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	static public function clean_template_name($name){
		return str_replace(' ', '_', strtolower($name));
	}

	

	/**
	 * lets check if ACF if action
	 * @return boolean [description]
	 */
	static function is_acf_active(){
		return (function_exists('has_sub_field'))? true : false;
	}

	/**
	 * get ACF options
	 * @param  [type] $group_fields [description]
	 * @return [type]               [description]
	 */
	static function acf_options($group_fields){
		
		if(empty($group_fields) || !is_array($group_fields) || !em::is_acf_active()){
			return false;
		}

		$group_data = array();

		foreach($group_fields as $field){
			$group_data[$field] = get_field($field, 'option');
		}

		return $group_data;
	}
}
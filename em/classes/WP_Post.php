<?php namespace Em;

/**
 * This class to keep life dry, and encapulsate common WP tasks into a class
 */
class WP_Post {

	public $post = null;
	public $author = null;
	public $tags = null;
	public $meta = null;

	public function __construct($post=null, $setup=array('get_tags', 'get_author', 'setup_acf', 'get_feature_image')){

		$this->post = new \stdClass;

		if(!empty($post)){
			$this->setup_post($post)->setup_wp_stuff($setup);
		}
	}

	public function setup_post($post=null){

		if(empty($post) && !is_object($post)) return false;

		$this->post = $post;

		return $this;
	}

	public function setup_wp_stuff($setup=array()){

		if(empty($this->post)) return false;

		if(in_array('get_meta', $setup)){

			$this->meta = new \stdClass;

			$meta = get_post_meta($this->post->ID, null, false ); 
			
			foreach($meta as $key => $value){
				if(isset($value[0]) && !empty($value[0])){
					$this->meta->{$key} = $value[0];
				}
			}
		}

		if(in_array('get_tags', $setup)){
			$this->get_tags();
		}

		if(in_array('get_author', $setup)){
			$this->get_author();
		}

		if(in_array('get_feature_image', $setup)){
			$this->feature_image = $this->get_feature_image();
		}

		if(in_array('setup_acf', $setup)){
			$this->setup_acf();
		}

		return $this;
	}

	public function get($key=null, $array='post'){
		if(isset($this->{$array}->{$key})){
			$this->{$array}->{$key};
		}
		return null;
	}

	public function get_tags(){
		$this->tags = wp_get_post_tags($this->post->ID);
		return $this->tags;
	}

	public function get_author(){
		if(isset($this->post->post_author) && !empty($this->post->post_author)){
			$this->author = new \Em\User($this->post->post_author);
		}

		return $this->author;
	}

	public function get_feature_image($size='medium', $force = false, $default=true){

		if(!empty($this->feature_image) && !$force){
			return $this->feature_image;
		}
		
		$this->feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($this->post->ID), $size)[0];

		if(empty($this->feature_image) && $default){
			$this->feature_image = Helper::default_img($size,'','search');
		}

		return $this->feature_image;
	}

	public function has_feature_image(){
		return (!empty($this->feature_image))? true : false;
	}

	public function comments_open(){
		if(isset($this->post->ID)){
			return comments_open($this->post->ID); //need to implement
		}

		return false;
	}

	public function setup_acf(){
		$fields = get_fields($this->post->ID);
		
		if(!empty($fields)){
			$this->acf = new \stdClass;

			foreach($fields as $key => $value){
				$this->acf->{$key} = $value;
			}
		}

		return true;
	}
}
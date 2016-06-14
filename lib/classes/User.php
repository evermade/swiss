<?php namespace Swiss;

class User {

	protected $image_keys = array('user_profile_image');
	public $meta, $user, $images, $data;

	public function __construct($id=null){

		if(!empty($id)){

			$user = get_userdata($id);

			if(!empty($user)){

				$this->user = new \stdClass;

				foreach($user->data as $key => $value){
					if($key == 'user_pass') continue;
					$this->user->{$key} = $value;
				}

				$this->setup_meta();

				$this->data = new \stdClass;

				$this->get_social();
			}
		}
	}

	public function setup_meta(){

		if(isset($this->user->ID)){
			$meta = get_user_meta($this->user->ID);

			if(!empty($meta)){

				$this->meta = new \stdClass;

				 //lets loop and setup meta
				foreach($meta as $key => $value){
					if(isset($value[0]) && !empty($value[0])){
						$this->meta->{$key} = $value[0];
					}
				}
			}
		}

		return true;
	}

	public function setup_images(){
		//setup our images from our meta
		if(!empty($this->image_keys)){

			$this->images = new \stdClass;

			foreach($this->image_keys as $key => $value){

				if(isset($this->meta->{$key})){
					$image = wp_get_attachment_image_src($this->meta->{$key}, $value);

					if(is_array($image)){
						$this->images->{$key} = $image[0];
					}
					else {
						$this->images->{$key} = 'http://fakeimg.pl/650x650/eeeeee/666/?text=img';
					}
				}
			}
		}

		return true;
	}

	public function get($array = 'data', $key='display_name'){
		if(isset($this->{$array}->{$key})){
			return $this->{$array}->{$key};
		}
		return null;
	}

	public function get_image($key='user_profile_image'){
		return $this->get('images', $key);
	}

	public function get_full_name(){
		return $this->get('meta', 'first_name').' '.$this->get('meta', 'last_name');
	}

	public function author_posts_link(){
		return sprintf('<a href="%s" title="View posts from %s">%s</a>', $this->data->url, $this->get_full_name(), $this->get_full_name());
	}

	public function get_social(){
		$services = array('user_facebook', 'user_twitter', 'user_linkedin');
		$this->data->social_links = array();

		foreach($services as $service){
			if(isset($this->meta->{$service}) && !empty($this->meta->{$service})){
				$this->data->social_links[str_ireplace('user_', '', $service)] = $this->meta->{$service};
			}
		}

		return true;
	}

	public function get_email(){
		return $this->get('user', 'user_email');
	}

	public function get_telephone(){
		return $this->get('meta', 'user_telephone');
	}

	public function get_all_posts($post_type = 'post', $post_status = 'publish' ) {
     	
     	$args = array(
     			'posts_per_page'=>-1,
     			'fields'=>'ids',
     			'author'=> $this->user->ID,
     			'post_type'=>$post_type, 
     			'post_status'=> $post_status
     		); 
	     
	    $query = new \WP_Query($args);
	     
	    return $query->posts;
	}

}
<?php namespace Swiss;

class User {

    protected $image_keys = array('user_profile_image');
    public $meta, $user, $data;

    public function __construct($id=null) {

        if(!empty($id)) {

            $user = get_userdata($id);

            if(!empty($user)){
                $this->setup($user);
            }
        }
    }

    public function setup($user = null) {

        if(empty($user)) return false;

        $this->user = new \stdClass;

        foreach($user->data as $key => $value) {

            $ignore = array('user_pass', 'user_activation_key');

            if(in_array($key, $ignore)) continue;

            $this->user->{$key} = $value;
        }

        // $this->setup_meta();

        $this->data = new \stdClass;

        $this->get_social();

        return $this;
    }

    public function setup_meta() {

        if(isset($this->user->ID)) {
            $meta = get_user_meta($this->user->ID);

            if(!empty($meta)) {

                $this->meta = new \stdClass;

                $ignore = array('session_tokens');

                // lets loop and setup meta
                foreach($meta as $key => $value) {

                    if(in_array($key, $ignore)) continue;

                    if(isset($value[0]) && !empty($value[0])) {
                        $this->meta->{$key} = $value[0];
                    }
                }
            }
        }

        return true;
    }

    public function get($array = 'data', $key='display_name') {
        if(isset($this->{$array}->{$key})) {
            return $this->{$array}->{$key};
        }

        return null;
    }

    public function get_image($key='user_profile_image') {
        return $this->get('images', $key);
    }

    public function get_full_name() {
        return $this->get('meta', 'first_name').' '.$this->get('meta', 'last_name');
    }

    public function get_social() {
        $services = array('user_facebook', 'user_twitter', 'user_linkedin');
        $this->data->social_links = array();

        foreach($services as $service) {
            if(isset($this->meta->{$service}) && !empty($this->meta->{$service})) {
                $this->data->social_links[str_ireplace('user_', '', $service)] = $this->meta->{$service};
            }
        }

        return $this->data->social_links;
    }

    public function get_email() {
        return $this->get('user', 'user_email');
    }

    public function get_telephone() {
        return $this->get('meta', 'user_telephone');
    }

    public function get_posts($post_type = 'post', $post_status = 'publish', $args = array()) {

        $default_args = array(
             'posts_per_page'   => -1,
             'author'           => $this->user->ID,
             'post_type'        => $post_type,
             'post_status'      => $post_status
         );

        $merged_args = array_merge($default_args, $args);
        $query = new \WP_Query($merged_args);

        return $query->posts;
    }
}
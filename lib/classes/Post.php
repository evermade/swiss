<?php namespace Evermade\Swiss;

/**
 * This class to keep life dry, and encapulsate common WP Post tasks into a class
 */
class Post {

    protected $post = null;
    protected $author = null;
    protected $tags = null;
    protected $meta = null;
    protected $acf = null;

    public function __construct($post=null, $setup=array('image', 'acf')) {

        $this->post = new \stdClass;

        if(!empty($post) && is_object($post)) {
            $this->setPost($post)->setup($setup);
        }

    }

    public function isValid() {
        return (empty($this->post) || !is_object($this->post))? false : true;
    }

    public function setPost($post=null) {

        if(empty($post) || !is_object($post)) return false;

        $this->post = $post;

        return $this;
    }

    public function setup($setup=array()) {

        if(!$this->isValid()) return false;

        if(in_array('meta', $setup)) {
            $this->getMeta();
        }

        if(in_array('tags', $setup)) {
            $this->getTags();
        }

        if(in_array('author', $setup)) {
            $this->getAuthor();
        }

        if(in_array('image', $setup)) {
            $this->featureImage = $this->getFeatureImage();
        }

        if(in_array('acf', $setup)) {
            $this->getAcf();
        }

        return true;
    }

    public function get($key, $property = 'post', $default = null){

        if(isset($this->{$property}) && is_array($this->{$property})){
            if(isset($this->{$property}[$key])) return $this->{$property}[$key];
        }

		if(isset($this->{$property}) && is_object($this->{$property})){
            if(isset($this->{$property}->{$key})) return $this->{$property}->{$key};
        }

        return $default;
    }

    public function getMeta() {

        if(!$this->isValid()) return false;

        $this->meta = new \stdClass;

        $meta = \get_post_meta($this->post->ID, null, false);

        if(!empty($meta)){
            foreach($meta as $key => $value) {
                if(isset($value[0]) && !empty($value[0])) {
                    $this->meta->{$key} = $value[0];
                }
            }
        }

        return $this->meta;
    }

    public function getTags() {
        $this->tags = \wp_get_post_tags($this->post->ID);

        return $this->tags;
    }

    public function getFeatureImage($size='medium-large', $default=true) {

        // if we have a feature image already lets use that
        if(!empty($this->featureImage)){
            return $this->featureImage;
        }

        $this->featureImage = \wp_get_attachment_image_src(\get_post_thumbnail_id($this->post->ID), $size)[0];

        // if no default image is found, and we want a default, get one
        if(empty($this->featureImage) && $default) {
            $this->featureImage = \Evermade\Swiss\defaultImg($size, 'img');
        }

        return $this->featureImage;
    }

    public function getAcf() {
        $fields = \get_fields($this->post->ID);

        if(!empty($fields)) {
            $this->acf = new \stdClass;

            foreach($fields as $key => $value) {
                $this->acf->{$key} = $value;
            }
        }

        return true;
    }
}

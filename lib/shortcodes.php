<?php namespace Swiss\Shortcodes;

function button($atts){

	extract(shortcode_atts(array(
      'class' => '',
      'text' => 'Submit',
      'url' => '#',
   ), $atts));

	return sprintf('<a href="%s" class="c-btn %s"><span>%s</span></a>', $url, $class, $text);

}

function register(){
   add_shortcode('button', 'Swiss\Shortcodes\button');
}

add_action( 'init', '\Swiss\Shortcodes\register');
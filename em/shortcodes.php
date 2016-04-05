<?php

function button_shortcode_function($atts){

	extract(shortcode_atts(array(
      'class' => '',
      'text' => 'Continue',
      'url' => '#',
   ), $atts));

	$return = '<a href="'.$url.'" class="btn '.$class.'"><span>'.$text.'</span></a>';

	return $return;
}

function register_shortcodes(){
   add_shortcode('button', 'button_shortcode_function');
}

add_action( 'init', 'register_shortcodes');
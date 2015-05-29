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

function posts_shortcode_function($atts){

	extract(shortcode_atts(array(
      'number' => '4'
   ), $atts));

	$args = array(
		'posts_per_page'=>$number,
		'post_type'=>'post'
		);

	global $post;
	$custom_posts = new WP_Query($args);

	if($custom_posts->have_posts()){
		ob_start();

		include(get_template_directory().'/templates/posts.small.php');

		$return = ob_get_contents();
		ob_end_clean();
	}

	return $return;
}

function register_shortcodes(){
   add_shortcode('button', 'button_shortcode_function');
   add_shortcode('posts', 'posts_shortcode_function');
}

add_action( 'init', 'register_shortcodes');
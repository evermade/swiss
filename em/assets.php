<?php
function scripts_and_styles() {

	// de-register jquery, since we are manually adding it
	wp_deregister_script('jquery');

	// let's get a specific version of jquery
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', array(), null, false);

	//scripts
	wp_enqueue_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js');
	wp_enqueue_script( 'myquery', get_template_directory_uri().'/assets/dist/js/myquery.js', array(), null, true);
	wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/vendor/slick-carousel/slick/slick.min.js', array(), null, true);
	wp_enqueue_script( 'masonry', get_template_directory_uri().'/assets/vendor/masonry/dist/masonry.pkgd.min.js', array(), null, true);
	wp_enqueue_script( 'zeroclipboard', get_template_directory_uri().'/assets/vendor/zeroclipboard/dist/ZeroClipboard.js', array(), null, true);

	//fonts
	wp_enqueue_style( 'google_fonts', 'http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,100italic,100,300italic,500,500italic,700,700italic,900,900italic');
	
	//styles
	wp_enqueue_style( 'our_css', get_template_directory_uri().'/assets/dist/css/main.css');
	wp_enqueue_style( 'font_awesome', get_template_directory_uri().'/assets/vendor/fontawesome/css/font-awesome.min.css');
	wp_enqueue_style( 'slick', get_template_directory_uri().'/assets/vendor/slick-carousel/slick/slick.css');
}

add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );
<?php
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 

add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );

function scripts_and_styles() {

	//scripts
	wp_enqueue_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js');
	wp_enqueue_script( 'myquery', get_template_directory_uri().'/assets/dist/js/myquery.js', array(), null, true);
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri().'/assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js', array(), null, true);
	wp_enqueue_script( 'justified_gallery', get_template_directory_uri().'/assets/vendor/Justified-Gallery/dist/js/jquery.justifiedGallery.min.js', array(), null, true);

	//and styles
	wp_enqueue_style( 'google_fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,400italic');
	wp_enqueue_style( 'font_awesome', get_template_directory_uri().'/assets/vendor/fontawesome/css/font-awesome.min.css');
	wp_enqueue_style( 'our_css', get_template_directory_uri().'/assets/dist/css/main.css');
	wp_enqueue_style( 'justified_gallery', get_template_directory_uri().'/assets/vendor/Justified-Gallery/dist/css/justifiedGallery.css');


}
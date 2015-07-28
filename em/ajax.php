<?php

add_action( 'wp_ajax_my_posts', 'my_posts' );
add_action( 'wp_ajax_nopriv_my_posts', 'my_posts' );

function my_posts() {
  include(get_template_directory().'/ajax.php');
  wp_die();
}
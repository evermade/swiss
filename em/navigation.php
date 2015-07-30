<?php

//add some menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-navigation' => __( 'Header Navigation' ),
      'footer-navigation' => __( 'Footer Navigation' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
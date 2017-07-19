<?php

define( 'DEFAULT_IMG_ID', 668 ); // image ID from https://unsplash.it/images

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Website Options',
        'menu_title'    => 'Website Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Social Media Links',
        'menu_title'    => 'Social Media Links',
        'parent_slug'   => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Default Page Blocks',
        'menu_title'    => 'Default Page Blocks',
        'parent_slug'   => 'theme-general-settings'
    ));
}
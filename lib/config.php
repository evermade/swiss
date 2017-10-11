<?php

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Website Options',
        'menu_title'    => 'Website Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Default Page Blocks',
        'menu_title'    => 'Default Page Blocks',
        'parent_slug'   => 'theme-general-settings'
    ));
}

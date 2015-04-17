<?php 

//filters and actions
add_filter('show_admin_bar', '__return_false'); //lets hide the admin bar in the

//lets remove the main text editor from the pages post type as we are using blocks
function custom_post_types_editing(){
	remove_post_type_support( 'page', 'editor' );
}
add_action("admin_init", "custom_post_types_editing");

// Filter Functions with Hooks, lets check if editors are on and user has permission
function custom_mce_em_buttons() {
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled then add filters
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'custom_tinymce_plugin' );
    add_filter( 'mce_buttons', 'register_mce_button' );
  }
}

add_action('admin_head', 'custom_mce_em_buttons');

// js Function for new button
function custom_tinymce_plugin( $plugin_array ) {
  $plugin_array['custom_mce_em_buttons'] = get_template_directory_uri() .'/editor_plugin.js';
  $plugin_array['custom_mce_em_posts'] = get_template_directory_uri() .'/editor_plugin.js';
  return $plugin_array;
}

// Register new button in the editor
function register_mce_button( $buttons ) {
  array_push( $buttons, 'custom_mce_em_buttons' );
  array_push( $buttons, 'custom_mce_em_posts' );
  return $buttons;
}

//menus
function register_my_menu() {
  register_nav_menu('primary-navigation',__( 'Primary Navigation' ));
}
add_action( 'init', 'register_my_menu' );
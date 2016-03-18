<?php 

//our functions

function custom_post_types_editing(){
	remove_post_type_support( 'page', 'editor' );
}

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

//load our js
function custom_tinymce_plugin( $plugin_array ) {
  $plugin_array['custom_mce_em_buttons'] = get_template_directory_uri() .'/editor_plugin.js';
  return $plugin_array;
}

function register_mce_button( $buttons ) {
  array_push( $buttons, 'custom_mce_em_buttons' );
  return $buttons;
}

function em_load_theme_textdomain() {
   load_theme_textdomain('swiss', get_template_directory() . '/languages');
}

//our filters that use the function above

//lets hide the admin bar in the
add_filter('show_admin_bar', '__return_false'); 

//lets add feature image to posts by default
add_theme_support( 'post-thumbnails', array('post'));

//register new buttons in the editor
add_action('admin_head', 'custom_mce_em_buttons');

//lets remove the main text editor from the post type as we are using block system
add_action("admin_init", "custom_post_types_editing");

//lets add our local languages for the swiss text domain
add_action( 'after_setup_theme', 'em_load_theme_textdomain' );
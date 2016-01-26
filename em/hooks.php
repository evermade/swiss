<?php 

//filters and actions
add_filter('show_admin_bar', '__return_false'); //lets hide the admin bar in the

add_theme_support( 'post-thumbnails', array('post'));

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
  return $plugin_array;
}

// Register new button in the editor
function register_mce_button( $buttons ) {
  array_push( $buttons, 'custom_mce_em_buttons' );
  return $buttons;
}


function remove_dashboard_meta() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );


function evermade_dashboard_widget_setup() {
  include(get_template_directory().'/templates/evermade-dashboard-widget.php');
}

function faq_add_dashboard_widget() {

  wp_add_dashboard_widget(
     'evermade_dashboard_widget',         // Widget slug.
     'Evermade Support',         // Title.
     'evermade_dashboard_widget_setup' // Display function.
  );
}
add_action( 'wp_dashboard_setup', 'faq_add_dashboard_widget' );
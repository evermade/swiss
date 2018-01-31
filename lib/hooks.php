<?php namespace Swiss\Hooks;

function default_blocks($value, $post_id, $field) {

    global $post;

    // if value is NULL then we have a new page and we want to add the default blocks
    if($value !== NULL) return $value;

    // get our defaults
    $defaults = get_field('post_block_defaults', 'option');

    // if we have some
    if(!empty($defaults)) {

        // loop our defaults
        foreach ($defaults as $a => $b) {

            // if our current post type editing page is this one lets go
            if($b['post_type'] == $post->post_type){

                // make value var array so we can push in
                $value = array();

                // loop the blocks in this post type
                foreach ($b['blocks'] as $c => $d) {

                    // finally push in
                    array_push($value, array('acf_fc_layout' => $d['block']));

                }
            }
        }
    }

    // and return
    return $value;
}

function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'updates' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'wpseo-menu' );
}

function hide_wp_update_nag() {
    remove_action( 'admin_notices', 'update_nag', 3 ); // update notice at the top of the screen
    remove_filter( 'update_footer', 'core_update_footer' ); // update notice in the footer
}

function theme_setup_options() {
    \Swiss\activate_plugin( 'advanced-custom-fields-pro/acf.php' );
}

function register_my_menus() {
    register_nav_menus(
        array(
            'header-navigation' => __( 'Header Navigation' ),
            'footer-navigation' => __( 'Footer Navigation' )
        )
    );
}

function custom_post_types_editing() {
    remove_post_type_support( 'page', 'editor' );
}

function custom_mce_em_buttons() {
    // Check if user have permission
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // Check if WYSIWYG is enabled then add filters
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', '\Swiss\Hooks\custom_tinymce_plugin' );
        add_filter( 'mce_buttons', '\Swiss\Hooks\register_mce_button' );
    }
}

// load our js
function custom_tinymce_plugin( $plugin_array ) {
    $plugin_array['custom_mce_em_buttons'] = get_template_directory_uri() .'/assets/admin/js/editor_plugin.js';
    return $plugin_array;
}

function register_mce_button( $buttons ) {
    array_push( $buttons, 'custom_mce_em_button' );
    if(\Swiss\is_dev()) array_push( $buttons, 'custom_mce_em_lorem' );
    return $buttons;
}

function em_load_theme_textdomain() {
    load_theme_textdomain('swiss', get_template_directory() . '/languages');
}

function lower_wpseo_priority( $html ) {
    return 'low';
}

// our filters that use the function above

// lets hide the admin bar in the
add_filter( 'show_admin_bar', '__return_false' );

// lets add feature image to posts by default
add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );

// register new buttons in the editor
add_action( 'admin_head', '\Swiss\Hooks\custom_mce_em_buttons' );

// lets remove the main text editor from the post type as we are using block system
add_action( 'admin_init', '\Swiss\Hooks\custom_post_types_editing' );

// lets add our local languages for the swiss text domain
add_action( 'after_setup_theme', '\Swiss\Hooks\em_load_theme_textdomain' );

// navigation
add_action( 'init', '\Swiss\Hooks\register_my_menus' );

// lets setup our theme upon activating it
add_action( 'after_switch_theme', '\Swiss\Hooks\theme_setup_options' );

// hide update nags
add_action( 'admin_menu','\Swiss\Hooks\hide_wp_update_nag' );

// remove wp top bar stuff
add_action( 'admin_bar_menu', '\Swiss\Hooks\remove_wp_logo', 999 );

// Lower the display priority of Yoast SEO meta box
add_filter( 'wpseo_metabox_prio', '\Swiss\Hooks\lower_wpseo_priority' );

// Add default page blocks feature
add_filter( 'acf/load_value/key=field_54ddee97933e5', '\Swiss\Hooks\default_blocks', 10, 3 );

// when ACF inits lets add our local block field groups
add_action('acf/init', '\Evermade\Swiss\Acf\registerLocalBlockFieldGroups');

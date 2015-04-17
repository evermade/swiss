<?php
//lets setup some custom post types to manage in the backend
// function pressreleases_setup_type() {
// 	  $labels = array(
// 	    'name'               => _x( 'Press Releases', 'post type general name' ),
// 	    'singular_name'      => _x( 'Press Release', 'post type singular name' ),
// 	    'add_new'            => _x( 'Add New Press Release', 'book' ),
// 	    'add_new_item'       => __( 'Add New Press Release' ),
// 	    'edit_item'          => __( 'Edit Press Release' ),
// 	    'new_item'           => __( 'New Press Release' ),
// 	    'all_items'          => __( 'All Press Releases' ),
// 	    'view_item'          => __( 'View Press Release' ),
// 	    'search_items'       => __( 'Search Press Releases' ),
// 	    'not_found'          => __( 'No Press Releases found' ),
// 	    'not_found_in_trash' => __( 'No Press Releases found in the Trash' ), 
// 	    'parent_item_colon'  => '',
// 	    'menu_name'          => 'Press Releases'
// 	  );
// 	  $args = array(
// 	    'labels'        => $labels,
// 	    'description'   => 'Press Releases',
// 	    'public'        => true,
// 	    'menu_position' => 5,
// 	    'supports'      => array(),
// 	    'has_archive'   => true,
// 	  );
// 	  register_post_type( 'press-releases', $args ); 
// }

function set_custom_types(){
	//pressreleases_setup_type();
}

add_action( 'init', 'set_custom_types' );
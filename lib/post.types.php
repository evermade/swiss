<?php namespace Swiss\PostTypes;

//lets setup some custom post types to manage in the backend

function objects_setup_type() {
	  $labels = array(
	    'name'               => _x( 'Objects', 'post type plural name' ),
	    'singular_name'      => _x( 'Object', 'post type singular name' ),
	    'add_new'            => _x( 'Add New Object', 'add new Object context' ),
	    'add_new_item'       => __( 'Add New Object', 'swiss' ),
	    'edit_item'          => __( 'Edit Object', 'swiss' ),
	    'new_item'           => __( 'New Object', 'swiss' ),
	    'all_items'          => __( 'All Objects', 'swiss' ),
	    'view_item'          => __( 'View Object', 'swiss' ),
	    'search_items'       => __( 'Search Objects', 'swiss' ),
	    'not_found'          => __( 'No Objects found', 'swiss' ),
	    'not_found_in_trash' => __( 'No Objects found in the Trash', 'swiss' ), 
	    'parent_item_colon'  => '',
	    'menu_name'          => __('Objects')
	  );
	  $args = array(
	    'labels'        => $labels,
	    'description'   => __('Objects'),
	    'public'        => true,
	    'menu_position' => 5,
	    'supports'      => array(),
	    'has_archive'   => true,
	    'publicly_queryable'  => false,
	    'exclude_from_search' => true,
	    'menu_icon'   => 'dashicons-book',
	  );
	  register_post_type( 'object', $args ); 
}

function set_custom_types(){
	objects_setup_type();
}

add_action( 'init', 'Swiss\PostTypes\set_custom_types' );
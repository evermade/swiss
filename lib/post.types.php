<?php namespace Swiss\PostTypes;

/*
* -----------------------------------------------------
 * EXAMPLE POST TYPE
 * -----------------------------------------------------
*/

function example_setup_type() {

	  $labels = createPostLabels("Example","Examples");

	  $args = array(
	    'labels'        => $labels,
	    'description'   => __('This is an example description'),
	    'public'        => true,
	    'menu_position' => 5,
	    'supports'      => array('title', 'editor', 'thumbnail'),
	    'taxonomies'    => array('category', 'post_tag'),
	    'has_archive'   => true,
	    'publicly_queryable'  => false,
	    'exclude_from_search' => true,
	    'menu_icon'   => 'dashicons-book',
	  );

	  register_post_type( 'example', $args );
}





/*
* -----------------------------------------------------
 * ENABLE/DISABLE CUSTOM POST TYPES
 * -----------------------------------------------------
*/

function set_custom_types(){
	//example_setup_type();
}

add_action( 'init', 'Swiss\PostTypes\set_custom_types' );


/*
 * -----------------------------------------------------
 * LABEL MAKER
 * Makes it easy to create all labels with a function
 * createPostLabels("Example","Examples");
 * -----------------------------------------------------
*/

function createPostLabels($singular,$plural){
	$labels = array(
		'name'               => _x( $plural, 'post type general name' ),
		'singular_name'      => _x( $singular, 'post type singular name' ),
		'add_new'            => _x( 'Add New '.$singular, 'book' ),
		'add_new_item'       => __( 'Add New '.$singular ),
		'edit_item'          => __( 'Edit '.$singular ),
		'new_item'           => __( 'New '.$singular ),
		'all_items'          => __( 'All '.$plural ),
		'view_item'          => __( 'View '.$singular ),
		'search_items'       => __( 'Search '.$plural ),
		'not_found'          => __( 'No '.$plural.' found' ),
		'not_found_in_trash' => __( 'No '.$plural.' found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => $plural
	);

	return($labels);
}

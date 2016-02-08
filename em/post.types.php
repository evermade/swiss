<?php
//lets setup some custom post types to manage in the backend

// function testimonials_setup_type() {
// 	  $labels = array(
// 	    'name'               => _x( 'Testimonials', 'post type general name' ),
// 	    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
// 	    'add_new'            => _x( 'Add New Testimonial', 'book' ),
// 	    'add_new_item'       => __( 'Add New Testimonial' ),
// 	    'edit_item'          => __( 'Edit Testimonial' ),
// 	    'new_item'           => __( 'New Testimonial' ),
// 	    'all_items'          => __( 'All Testimonials' ),
// 	    'view_item'          => __( 'View Testimonial' ),
// 	    'search_items'       => __( 'Search Testimonials' ),
// 	    'not_found'          => __( 'No Testimonials found' ),
// 	    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
// 	    'parent_item_colon'  => '',
// 	    'menu_name'          => 'Testimonials'
// 	  );
// 	  $args = array(
// 	    'labels'        => $labels,
// 	    'description'   => 'Testimonials',
// 	    'public'        => true,
// 	    'menu_position' => 5,
// 	    'supports'      => array(),
// 	    'has_archive'   => true,
// 	    'publicly_queryable'  => false,
// 	    'exclude_from_search' => true,
// 	    'menu_icon'   => 'dashicons-book',
// 	  );
// 	  register_post_type( 'testimonial', $args ); 
// }

function set_custom_types(){
	//testimonials_setup_type();
}

add_action( 'init', 'set_custom_types' );
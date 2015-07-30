<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;
global $post;

//set and get the fields for this post
$block->get_fields(array('posts', 'posts_how_many'));

if(empty($block->fields['posts'])){

	if(empty($block->fields['posts_how_many'])){
		$block->set('posts_how_many', 4);
	}
	else {
		$block->set('posts_how_many', $block->fields['posts_how_many']);
	}

	$args = array(
		'posts_per_page'=>$block->get('posts_how_many'),
		'post_type'=>'post'
	);

	$custom_posts = new WP_Query($args);
	$block->set('posts', $custom_posts->posts);
}
else {
	$block->set('posts', $block->fields['posts']);
}

$block->set('per_row', 2);

include(__DIR__.'/view.php');
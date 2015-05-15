<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the fields for this post
$block->set_fields(array('posts', 'posts_how_many'));
$block->get_fields();

if(empty($block->fields['posts'])){
	$block->fields['posts_how_many'] = (empty($block->fields['posts_how_many']))? 4 : $block->fields['posts_how_many'];
	$args = array(
	'posts_per_page'=>$block->fields['posts_how_many'],
	'post_type'=>'post'
	);

	global $post;
	$custom_posts = new WP_Query($args);
	$block->data['posts'] = $custom_posts->posts;
}
else {
	$block->data['posts'] = $block->fields['posts'];
}

$block->data['grid_columns'] = em::number_of_columns(sizeof($block->data['posts']));
$block->data['per_row'] = 2;

include(__DIR__.'/view.php');
<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
$block->get_fields(array('columns_id', 'columns_background', 'columns_text_color'));

//set and get the repeater columns for this post
$block->get_repeater_field(['columns_columns']);

//how many per row
$block->data['per_row'] = 99;

//setup background image for main section block
$block->setup_background_image('columns_background');

//set an identifer for use in css
$block->addClass($block->fields['columns_id'], 'section');

//ACF changed the output from a select in the WP Admin ui, now returns an array
if(is_array($block->fields['columns_text_color'])){

	//so lets grab first key
	reset($block->fields['columns_text_color']);
	$block->data['columns_text_color'] = key($block->fields['columns_text_color']);

	$block->addClass($block->data['columns_text_color'], 'section');
}

include(__DIR__.'/view.php');
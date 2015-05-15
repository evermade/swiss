<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
$block->set_fields(array('columns_id', 'columns_background', 'columns_text_color'));
$block->get_fields();

//set and get the repeater columns for this post
$block->setup_repeater_field('columns_columns');

//how many per row
$block->data['per_row'] = 99;

//setup background image for main section block
$block->setup_background_image('columns_background');

//set an identifer for use in css
$block->fields['columns_id'] = (!empty($block->fields['columns_id']))? ' '.$block->fields['columns_id'] : null;

//ACF changed the output from a select in the WP Admin ui, no returns an array
if(is_array($block->fields['columns_text_color'])){

	//so lets grab first key
	reset($block->fields['columns_text_color']);
	$block->data['columns_text_color'] = key($block->fields['columns_text_color']);

	$block->addClass($block->data['columns_text_color'], 'section');
}

$block->addClass($block->fields['columns_id'], 'section');

include(__DIR__.'/view.php');
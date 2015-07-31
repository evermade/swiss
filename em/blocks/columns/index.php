<?php 
global $app;
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
$block->get_fields(array('columns_background', 'columns_text_color', 'columns_padding', 'columns_title', 'columns_vertical_alignment', 'columns_type'));

//set and get the repeater columns for this post
$block->get_repeater_field(['columns_columns']);

//how many per row
$block->set('per_row', 99);

//setup background image for main section block
$block->set_background_image('columns_background');

//lets add some css classes from the block settings

//set an identifer for use in css
$block->addCss($block->fields['columns_text_color'], 'section');
$block->addCss($block->fields['columns_padding'], 'section');
$block->addCss('columns--'.$block->fields['columns_type'], 'section');

include(__DIR__.'/view.php');
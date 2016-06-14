<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

//set and get the acf fields for this block
$block->get_fields(array('columns_title', 'columns_vertical_alignment', 'columns_type'));

//set and get the repeater columns for this post
$block->get_repeater_field(['columns_columns']);

//how many per row
$block->set('per_row', 4);

//set an identifer for use in css
$block->addCss('columns--'.$block->fields['columns_type'], 'section');

include(__DIR__.'/view.php');
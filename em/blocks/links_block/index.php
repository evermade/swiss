<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
// $block->get_fields(array('field_name', 'field_name2'));

//set and get the repeater columns for this block
$block->get_repeater_field(['links_block_items']);

include(__DIR__.'/view.php');
<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
$block->get_fields(array('listing_title', 'listing_text'));

//set and get the repeater columns for this block
$block->get_repeater_field(['listing_list']);

$block->set('per_row', 8); //large number for 1 row, else change

include(__DIR__.'/view.php');
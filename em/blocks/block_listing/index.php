<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the acf fields for this block
$block->get_fields(array('block_listing_title', 'block_listing_background'));

//set and get the repeater columns for this block
$block->get_repeater_field(['block_listing_items']);

//setup background image for main section block
$block->set_background_image('block_listing_background');

include(__DIR__.'/view.php');
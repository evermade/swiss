<?php 
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the repeater columns for this post
$block->setup_repeater_field('slider_slides');

//how many per row
$block->data['per_row'] = 99;

include(__DIR__.'/view.php');
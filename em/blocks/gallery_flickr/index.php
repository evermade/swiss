<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

//set and get the repeater columns for this block
$block->get_repeater_field(['gallery_images']);

include(__DIR__.'/view.php');
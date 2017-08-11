<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->get_fields(array('background_image', 'text', 'posts'));

include(__DIR__.'/view.php');

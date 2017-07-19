<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->get_fields(array('layout', 'text', 'image', 'background_image_mode'));

include(__DIR__.'/view.php');
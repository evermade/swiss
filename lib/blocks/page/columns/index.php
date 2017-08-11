<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this post
$block->get_fields(['columns']);

// how many max per row
$block->set('per_row', 4);

include(__DIR__.'/view.php');

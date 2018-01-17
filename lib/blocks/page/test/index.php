<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this post
$block->getFields(['text']);

if(!empty($block->get('text'))) include(__DIR__.'/view.php');

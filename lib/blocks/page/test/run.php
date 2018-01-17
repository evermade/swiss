<?php

// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this post
$block->getFields(['text']);

echo \Evermade\Swiss\Blocks\Test\theTime();

if(!empty($block->get('text'))) include (__DIR__.'/templates/view.php');

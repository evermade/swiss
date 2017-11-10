<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this post
$block->getFields(['columns', 'horizontal_alignment']);

$block->addCss('l-columns--'.$block->get('horizontal_alignment'), 'layout');

if(!empty($block->get('columns'))) include(__DIR__.'/view.php');

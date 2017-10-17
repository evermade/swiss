<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->getFields(array('columns', 'image_type', 'section-header'));

if(!empty($block->get('columns'))) include(__DIR__.'/view.php');

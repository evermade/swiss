<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->getFields(array('background_image', 'text', 'posts'));

// build a class list, or set of inline styles
if(true) {
    $block->addCss('some-class', 'someIndentifer');
}

include(__DIR__.'/view.php');

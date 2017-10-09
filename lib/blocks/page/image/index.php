<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->getFields(array('image_image', 'image_maximum_width'));

$imageCSS = "";

if($block->fields['image_maximum_width']){
    $imageCSS .= "max-width:".$block->fields['image_maximum_width']."px";
}

include(__DIR__.'/view.php');

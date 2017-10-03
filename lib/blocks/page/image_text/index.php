<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->get_fields(array(
    'layout', 
    'text', 
    'image', 
    'image_foreground',
    'image_foreground_vertical_alignment',
    'image_foreground_maximum_width'
));

$imageAreaCSS = "";

$imageCSS = "";

$imageForeground = "";


// set image
$imageAreaCSS = "background-image: url(".\Swiss\Acf\getImageUrl('large', $block->get('image')).");";

// set foreground image
$foregroundCSS = "";

if($block->fields['image_foreground_maximum_width']){
    $foregroundCSS .= "max-width:".$block->fields['image_foreground_maximum_width']."px;";
}

if($block->fields['image_foreground']){
    $imageForeground .= "<img style='".$foregroundCSS."' class='b-image-text__foreground-img' src='".\Swiss\Acf\getImageUrl('large', $block->get('image_foreground'))."' />";
}

// set image ratio using the images original sizes;
/*$imageTextPaddingTop = ($block->fields['image']['height']/$block->fields['image']['width'])*100;

if($imageTextPaddingTop){
    $imageCSS .= "padding-top:".$imageTextPaddingTop."%;";
}*/

include(__DIR__.'/view.php');
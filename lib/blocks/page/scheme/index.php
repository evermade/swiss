<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->get_fields(array(
    'scheme_color', 
    'scheme_images', 
    'scheme_full_height',
    'scheme_block_vertical_alignment'
));

// set and get the repeater columns for this block
//$block->get_repeater_field(['assets']);

if ($block->get('scheme_color')):
    $block->addCss('scheme--'.$block->get('scheme_color'), 'section');
endif;

$assets_html = '';

// get the block assets
if (!empty($block->repeaters['assets'])):

    foreach($block->repeaters['assets'] as $k => $v) {
        $assets_html .= \Swiss\template('_asset.php', $v);
    }

endif;

/* 

set b-scheme layout classes correctly
.b-scheme--full-height
.b-scheme--align-bottom
.b-scheme--align-top
.b-scheme--align-stretch

*/

$bSchemeClass = "";

if ($block->fields['scheme_full_height'] == "full-height"):
    $bSchemeClass .= " b-scheme--".$block->fields['scheme_block_vertical_alignment']." b-scheme--".$block->fields['scheme_full_height']; 
endif;



// setup background image for main section block
//$block->set_background_image('background_image');

include(__DIR__.'/view.php');
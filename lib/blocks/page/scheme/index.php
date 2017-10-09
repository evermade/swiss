<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->getFields(array(
    'scheme_color',
    'scheme_images',
    'scheme_full_height',
    'scheme_block_vertical_alignment'
));

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

if ($block->get('scheme_full_height') == "full-height"):
    $bSchemeClass .= " b-scheme--".$block->get('scheme_block_vertical_alignment')." b-scheme--".$block->get('scheme_full_height');
endif;

include(__DIR__.'/view.php');

<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->getFields(array(
    'scheme',
    'assets',
    'full_height',
    'vertical_alignment',
    'pin_blocks',
    'overflow_visibility',
    'minimum_height'
));

$block->addCss('s-context', 's-context');

if ($block->get('scheme') && $block->get('scheme') != 'default'):
    $block->addCss('s-context--'.$block->get('scheme'), 's-context');
endif;

$assets_html = '';

// get the block assets
if (!empty($block->get('assets'))):

    foreach($block->get('assets') as $k => $v) {
        $assets_html .= \Swiss\template('_asset.php', $v);
    }

endif;

/*

set b-section layout classes correctly
.b-section--full-height
.b-section--align-bottom
.b-section--align-top
.b-section--align-stretch

*/

$block->addCss('b-section', 'b-section');

$block->addCss("b-section--visibility-".$block->get('overflow_visibility'), 'b-section');

if ($block->get('full_height') == "full-height"):
    $block->addCss("b-section--".$block->get('vertical_alignment')." b-section--".$block->get('full_height')." b-section--visibility-".$block->get('overflow_visibility'), 'b-section');
endif;

include(__DIR__.'/view.php');

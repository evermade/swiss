<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

//set and get the acf fields for this block
$block->get_fields(array('name', 'background_image', 'background_image_style'));

//set and get the repeater columns for this block
$block->get_repeater_field(['assets']);

$block->addCss('scheme--'.$block->get('name'), 'section');

$assets_html = '';

//get the block assets
if(!empty($block->repeaters['assets'])){

	foreach($block->repeaters['assets'] as $k => $v){
		$assets_html .= \Swiss\template('_asset.php', $v);
	}

} 

//setup background image for main section block
$block->set_background_image('background_image');

include(__DIR__.'/view.php');
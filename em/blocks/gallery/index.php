<?php
//lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

$block->get_fields(array('gallery_type', 'gallery_title'));

//set and get the repeater columns for this block
$block->get_repeater_field(['gallery_images']);

$block->data['template'] = get_template_directory().'/em/blocks/gallery/templates/'.$block->fields['gallery_type'].'.php';

if(file_exists($block->data['template'])) include($block->data['template']);
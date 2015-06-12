<?php
// //lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new Block;

$block->data['fields'] = array('hero_title', 'hero_subtitle');

//set and get the acf fields for this block
$block->get_fields(array('hero_type'));

//set and get the repeater columns for this block
$block->get_repeater_field(['hero_slides']);

if(is_array($block->repeaters['hero_slides'])){

	foreach($block->repeaters['hero_slides'] as $k => $hero){

		//generate tmp file name from hero type
		$block->data['tmp'] = get_template_directory().'/em/blocks/hero/templates/'.$block->fields['hero_type'].'.php';

		//lets check if template exists and include it
		if(file_exists($block->data['tmp'])){

			//lets do some common tasks such as background images, default image?
			$hero_background = 'style=""';

			if(is_array($hero['slide_background'])){
				$hero_background = 'style="background-image: url('.$hero['slide_background']['sizes']['large'].');"';
			}

			include($block->data['tmp']);
		}
		else {
			continue;
		}
	}

}
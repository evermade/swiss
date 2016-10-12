<?php
// //lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

//set and get the repeater columns for this block
$block->get_repeater_field(['hero_slides']);

if(!empty($block->repeaters['hero_slides'])){ ?>

<section class="b-hero-slideshow">

	<?php foreach($block->repeaters['hero_slides'] as $k => $hero){

			//lets do some common tasks such as background images, default image?
			$hero_background = 'style=""';

			if(is_array($hero['slide_background'])){
				$hero_background = 'style="background-image: url('.$hero['slide_background']['sizes']['large'].');"';
			}

			include(__DIR__.'/view.php');
			
	} ?>

</section><!-- end of b-hero-slideshow -->

<?php }

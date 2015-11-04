<?php
	//to help debug and show what you have access to, all in the hero variable
	//echo "<pre>"; print_r($hero); echo "</pre>";
?>
<div class="hero__slide">
	<div class="hero__slide__background" data-animate1="animatedsuperslow fadeIn animateddelay1" <?php echo $hero_background; ?>></div>
	
	<?php if(isset($hero['slide_background_video']) && $hero['slide_background_video'] != null): ?>
	<video autoplay loop class="hero__slide__bgvideo" data-animate="animatedsuperslow fadeIn animateddelay1">
		<source src="<?php echo $hero['slide_background_video'];?>" type="video/mp4">
	</video>
	<?php endif; ?>

	<div class="hero__slide__overlay"></div>

	<div class="hero__slide__content">

		<?php echo Helper::image($hero['slide_image'], 'medium', 'hero__slide__image'); ?>

		<h1 class="hero__slide__title"><?php echo $hero['slide_title'] ?></h1>

		<?php echo Helper::sprint('<h2 class="hero__slide__subtitle">%s</h2>', $hero['slide_sub_title']); ?>

		<?php echo Helper::sprint('<div class="hero__slide__text">%s</div>', $hero['slide_text']); ?>

		<?php echo Helper::sprint('<a href="%s" class="btn hero__slide__btn">%s</a>', [$hero['slide_button_link'], $hero['slide_button_text']
		]); ?>

	</div><!-- end of hero-slide content -->

</div><!-- end of hero-slide -->

<?php
	//to help debug and show what you have access to, all in the hero variable
	//echo "<pre>"; print_r($hero); echo "</pre>";
?>
<div class="hero__slide">
	<div class="hero__slide__background" data-animate=" animatedsuperslow fadeIn animateddelay1" <?php echo $hero_background; ?>></div>

	<video autoplay loop class="hero__slide__bgvideo" data-animate=" animatedsuperslow fadeIn animateddelay1">
		<source src="http://cdn.evermade.fi/video/video-bg-small.mp4" type="video/mp4">
	</video>

	<div class="hero__slide__overlay"></div>

	<div class="hero__slide__container">

		<div class="hero__slide__row">
			<div class="hero__slide__col" data-animate="animatedslow fadeIn">
				<div class="el">
					
					<?php echo Helper::image($hero['slide_image'], 'medium-large', 'hero__image'); ?>

					<h1 class="hero__sldie__title"><?php echo $hero['slide_title'] ?></h1>

					<?php echo Helper::sprint('<h2 class="hero__sldie__subtitle">%s</h2>', $hero['slide_sub_title']); ?>

					<?php echo Helper::sprint('<div class="hero__sldie__text">%s</div>', $hero['slide_text']); ?>

					<div class="hero__sldie__countdown" id="clock" data-date="08-08-2015"></div>

					<?php echo Helper::sprint('<a href="%s" class="btn hero__sldie__btn">%s</a>', [$hero['slide_button_link'], $hero['slide_button_text']
					]); ?>
					
				</div>
			</div>
		</div><!-- end of row -->

	</div>

</div><!-- end of slide -->

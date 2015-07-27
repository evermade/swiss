<?php
	//to help debug and show what you have access to, all in the hero variable
	//echo "<pre>"; print_r($hero); echo "</pre>";
?>
<section class="hero hero--basic">
	<div class="hero__slides">

		<div class="hero__slide">

			<div class="hero__slide__background" data-vp-add-class=" animatedsuperslow fadeIn animateddelay1" <?php echo $hero_background; ?>></div>

			<!-- <video autoplay loop class="hero__slide__bgvideo" data-vp-add-class=" animatedsuperslow fadeIn animateddelay1">
				<source src="assets/dev/snow-falling-video.mp4" type="video/mp4">
			</video> -->

			<div class="hero__slide__overlay"></div>

			<div class="hero__slide__container">

				<div class="hero__slide__row">
					<div class="hero__slide__col" data-vp-add-class="animatedslow fadeIn">
						<div class="el">
							<h1 class="hero__title"><?php echo $hero['slide_title'] ?></h1>
							<?php echo Helper::sprint('<h2 class="hero__subtitle">%s</h2>', $hero['slide_sub_title']); ?>

							<?php echo Helper::sprint('<div class="hero__text">%s</div>', $hero['slide_text']); ?>

							<?php echo Helper::sprint('<a href="%s" class="btn hero__btn">%s</a>', [$hero['slide_button_link'], $hero['slide_button_text']
							]); ?>

							<?php echo Helper::image($hero['slide_image'], 'medium-large', 'hero__image'); ?>

							<?php echo Helper::sprint('<a href="#" class="hero__continue js-go-to-next"><span>%s</span><span></span></a>', $hero['slide_continue_text']); ?>

						</div>
					</div>
				</div><!-- end of row -->

				

			</div>

		</div><!-- end of slide -->

	</div><!-- end of wrapper -->
</section><!-- end of section -->
 <?php
	//to help debug and show what you have access to, all in the hero variable
	//echo "<pre>"; print_r($hero); echo "</pre>";
?>

<section class="hero hero--frontpage" <?php echo $hero_background; ?>>
	<div class="hero__slides">

		<?php for($i=0; $i<1; $i++): ?>
		<div class="hero__slide">

			<div class="hero__slide__background" data-vp-add-class=" animatedsuperslow fadeIn animateddelay1" <?php echo $hero_background; ?>></div>

			<div class="hero__slide__overlay"></div>

			<div class="hero__slide__container">

				<div class="hero__slide__row">
					<div class="hero__slide__col" data-vp-add-class="animatedslow fadeIn">
						<div class="el">
							<h1 class="hero__title"><?php echo $hero['slide_title'] ?></h1>
							<h2 class="hero__subtitle"><?php echo $hero['slide_sub_title'] ?></h2>

							<?php echo $hero['slide_text'] ?>
						</div>
					</div>
				</div><!-- end of row -->

			</div>

		</div><!-- end of slide -->
		<?php endfor; ?> 

	</div><!-- end of wrapper -->
</section><!-- end of section -->
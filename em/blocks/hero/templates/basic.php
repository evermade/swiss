<?php
	//to help debug and show what you have access to, all in the hero variable
	//echo "<pre>"; print_r($hero); echo "</pre>";
?>
<section class="hero hero--basic" <?php echo $hero_background; ?>>
	<div class="container">
		<div class="row">
			<div class="hero__center">
				<div class="full-width">
					<h1 class="hero__title"><?php echo $hero['slide_title'] ?></h1>
					<h2 class="hero__subtitle"><?php echo $hero['slide_sub_title'] ?></h2>
				</div>
			</div>
		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
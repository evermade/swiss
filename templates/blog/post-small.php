<div class="hero" data-animate="animated bounceIn" style="height:400px;">

	<div class="hero__background" style="background-image:url(<?php echo \Swiss\feature_image_url($post); ?>)"></div>

	<div class="hero__content hero__content--bottom hero__content--left">
		<div class="hero__content__overlay hero__content__overlay--fade-top"></div>
		<h2><?php the_title(); ?></h2>
		<p><?php the_date(); ?></p>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
	</div>

</div><!-- end of hero -->
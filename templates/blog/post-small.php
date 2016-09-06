<div class="hero" data-animate="animated bounceIn" style="height:400px;">

	<div class="hero__background" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>)"></div>

	<div class="hero__content hero__content--bottom hero__content--left">
		<div class="hero__content__overlay hero__content__overlay--fade-top"></div>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p><?php the_date(); ?></p>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn">Read More</a>
	</div>

</div><!-- end of hero -->
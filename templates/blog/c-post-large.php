<div class="c-post-large">

	<div class="c-post-large__background" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>)"></div>
	
	<div class="c-post-large__content">

		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		
		<p class="accent"><?php the_date(); ?></p>
		
		<?php //the_excerpt(); ?>
		
		<a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			Read Article
		</a>

	</div>	

</div><!-- end of hero -->
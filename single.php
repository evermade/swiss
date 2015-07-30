<?php get_header(); ?>

<section>
	<div class="single-post__container">
		<div class="row">
			<div class="single-post__content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div>
						<h1><?php the_title(); ?></h1>
						<h4>Posted on <?php the_time('F jS, Y') ?></h4>
						<?php the_content(); ?>
					</div>

					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
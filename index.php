<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div>
						<h1><?php the_title(); ?></h1>
						<h4>Posted on <?php the_time('F jS, Y') ?></h4>
						<?php the_content(__('(more...)')); ?>
						<p><a href="<?php the_permalink(); ?>">Read more</a></p>
					</div>

					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
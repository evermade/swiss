<?php get_header(); ?>

<?php if (have_posts()) : global $post; while (have_posts()) : the_post(); $my_post = new \Swiss\Post($post); ?>

	<section>
		<div class="hero" style="height:80vh;">

			<div class="hero__background" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>)"></div>

			<div class="hero__content hero__content--bottom hero__content--left">
				<div class="hero__content__overlay hero__content__overlay--fade-top"></div>

				<div class="container">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p><?php the_date(); ?></p>
				</div>
				
			</div>

		</div><!-- end of hero -->
	</section>

	<section>
		<div class="container">

			<div class="row">

				<div class="col-xs-12 wysiwyg-html">

					<?php the_content(); ?>
					<?php echo \Swiss\share_page(); ?>

				</div>

			</div>

		</div>
	</section>

	<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.', 'swiss'); ?></p>

<?php endif; ?>

<?php get_footer();
<?php get_header(); ?>

<?php if (have_posts()) : global $post; while (have_posts()) : the_post(); $my_post = new \Swiss\Post($post); ?>
	<section class="b-single-hero scheme--inverted">
		<div class="b-single-hero__bg" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>)"></div>
		<div class="b-single-hero__content-wrapper">
			<div class="b-single-hero__content-wrapper__container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="accent"><?php the_date(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="b-single-article scheme--default scheme--default__bg">
		<div class="b-single-article__container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="wysiwyg-html">
						<?php the_content(); ?>
						<?php echo \Swiss\share_page(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.', 'swiss'); ?></p>

<?php endif; ?>

<?php get_footer();
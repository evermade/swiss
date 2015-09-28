<?php get_header(); ?>

<section class="single-article">
	<div class="container">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header>
				<h1><?php the_title(); ?></h1>
				<p class="accent">Posted on <?php the_time('F jS, Y') ?></p>
			</header>
			<article>
				<?php the_content(); ?>
			</article>

			<?php endwhile; else: ?>

			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

		<?php endif; ?>

	</div>
</section>

<?php get_footer();
<?php get_header(); ?>

<section class="single-article">
	<div class="container">

		<?php if (have_posts()) : global $post; while (have_posts()) : the_post(); $my_post = new \Swiss\Post($post); ?>
			<header>
				<p><img src="<?php echo $my_post->get_feature_image('hero-large', true); ?>" alt="<?php the_title(); ?>"></p>
				<h1><?php the_title(); ?></h1>
				<p class="accent">Posted on <?php the_time('F jS, Y') ?></p>
			</header>
			<article>
				<?php the_content(); ?>
				<?php echo \Swiss\share_page(); ?>
			</article>

			<?php endwhile; else: ?>

			<p><?php _e('Sorry, no posts matched your criteria.', 'swiss'); ?></p>

		<?php endif; ?>

	</div>
</section>

<?php get_footer();
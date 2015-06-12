<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 blog__header">
				<?php if(is_search()): ?>
					<h1 class="blog__title">Search</h1>

					<p>You search for: <strong><?php echo get_search_query(); ?></strong></p>
					<p><strong><?php echo $wp_query->found_posts; ?></strong> results found.</p>

					<?php else: ?>

					<h1 class="blog__title">Blog</h1>	

				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="blog__filter">
				<h2 class="blog__filter__title">Filter</h2>

				<div class="blog__filter__search">
					<?php get_search_form(); ?>
				</div>
				
				<ul class="list list--vertical blog__filter__list">
				<?php wp_list_categories(); ?>
				</ul>

				<ul class="list list--vertical blog__filter__list">
					<li>Tag Cloud</li>
					<?php wp_tag_cloud(); ?>
				</ul>
				
				<ul class="list list--vertical blog__filter__list">
					<li>Archives</li>
					<?php wp_get_archives(); ?>
				</ul>
			</div>
			<div class="blog__posts">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article class="post post--small">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<h4>Posted on <?php the_time('F jS, Y') ?></h4>
						<?php the_excerpt(); ?>
						<p><a href="<?php the_permalink(); ?>" class="btn">Read more</a></p>
					</article>

					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 text-center">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
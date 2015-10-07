<section class="blog">
	<div class="blog__container">

		<div class="blog__header">
			<div class="blog__header__content">
				<?php if(is_search()): ?>
					<h1 class="blog__header__title">Search</h1>

					<p>You search for: <strong><?php echo get_search_query(); ?></strong></p>
					<p><strong><?php echo $wp_query->found_posts; ?></strong> results found.</p>

					<?php else: ?>

					<h1 class="blog__header__title">Blog</h1>	

				<?php endif; ?>
			</div>
		</div><!-- end of blog header -->

		<div class="row">

			<div class="blog__filter">
				<div class="blog__filter__inner">
					<h2 class="blog__filter__title">Filter</h2>

					<div class="blog__filter__search">
						<?php get_search_form(); ?>
					</div>
					
					<ul class="blog__filter__list">
					<?php wp_list_categories(); ?>
					</ul>

					<ul class="blog__filter__list">
						<li>Tag Cloud</li>
						<?php wp_tag_cloud(); ?>
					</ul>
					
					<ul class="blog__filter__list">
						<li>Archives</li>
						<?php wp_get_archives(); ?>
					</ul>
				</div><!-- end of blog filter inner-->
			</div><!-- end of blog filter -->

			<div class="blog__posts">
				<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); 

					include(get_template_directory().'/templates/post-small.php');

					endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
				</div>
			</div><!-- end of blog posts -->

		</div><!-- end of blog row -->

		<div class="row">
			<div class="col-xs-12 text-center">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div><!-- end of blog container-->
</section><!-- end of blog section -->
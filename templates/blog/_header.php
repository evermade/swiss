<?php if (get_search_query() || is_category() || is_date() || is_tag()) : ?>

    <div class="">

		<?php if(get_search_query()): ?>

			<p>You searched for: <strong><?php echo get_search_query(); ?></strong></p>

		<?php endif; ?>

		<?php if(is_category()): ?>

			<p>Selected Category: <strong><?php echo single_cat_title(); ?></strong></p>

		<?php endif; ?>

		<?php if(is_date()): ?>

		    <p>Date selected: <strong><?php echo get_the_date('F Y'); ?></strong></p>

		<?php endif; ?>

		<?php if(is_tag()): ?>

		    <p>Tag selected: <strong><?php echo single_tag_title('', false); ?></strong></p>

		<?php endif; ?>

		<p><?php echo $wp_query->post_count; ?> posts found.</p>

		<p><a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" title="Clear Search" class="">Clear search</a></p>

    </div>

<?php endif; ?>
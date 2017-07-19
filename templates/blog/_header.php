<?php if (get_search_query() || is_category() || is_date() || is_tag()) : ?>

    <div class="">

        <?php if(get_search_query()): ?>

            <h2>You searched for: <strong><?php echo get_search_query(); ?></strong></h2>

        <?php endif; ?>

        <?php if(is_category()): ?>

            <h2>Selected Category: <strong><?php echo single_cat_title(); ?></strong></h2>

        <?php endif; ?>

        <?php if(is_date()): ?>

            <h2>Date selected: <strong><?php echo get_the_date('F Y'); ?></strong></h2>

        <?php endif; ?>

        <?php if(is_tag()): ?>

            <h2>Tag selected: <strong><?php echo single_tag_title('', false); ?></strong></h2>

        <?php endif; ?>

        <p><?php echo $wp_query->post_count; ?> posts found.</p>

        <p><a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" title="Clear Search" class="">Clear search</a></p>

    </div>

<?php endif; ?>
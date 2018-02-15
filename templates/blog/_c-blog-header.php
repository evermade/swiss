<?php if (get_search_query() || is_category() || is_date() || is_tag() || is_author()) : ?> 

    <div class="c-blog-header" data-scheme-target>

        <p><?php echo $wp_query->post_count; ?> posts found.</p>

        <?php if (get_search_query()): ?>

            <h2><strong>You searched for:</strong> <?php echo get_search_query(); ?></h2>

        <?php endif; ?>

        <?php if (is_category()): ?>

            <h2><strong>Selected Category:</strong> <?php echo single_cat_title(); ?></h2>

        <?php endif; ?>

        <?php if (is_date()): ?>

            <h2><strong>Date selected:</strong> <?php echo get_the_date('F Y'); ?></h2>

        <?php endif; ?>

        <?php if (is_tag()): ?>

            <h2><strong>Tag selected:</strong> <?php echo single_tag_title('', false); ?></h2>

        <?php endif; ?>

        <?php if (is_author()): ?> 

            <h2><strong>Author selected:</strong> <?php echo the_author_link(); ?></h2>
            <p><?php echo get_the_author_meta('description'); ?></p>

        <?php endif; ?>

        <p><a href="<?php echo get_post_type_archive_link(get_post_type()); ?>" title="Clear Search" class="c-cta-link">Clear search</a></p>

    </div>

<?php endif; ?>
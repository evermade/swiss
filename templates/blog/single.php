<?php get_header(); ?>

<?php if (have_posts()) : global $post; while (have_posts()) : the_post(); $my_post = new \Evermade\Swiss\Post($post); ?>

<div class="s-context">
    <section class="b-blog">
        <div class="b-blog__container b-blog__container--wider">
            <div class="l-divided-spotlight" data-column-count="1">
                <div class="l-divided-spotlight__items">
                    <div class="l-divided-spotlight__item">
                        <?php include(get_template_directory().'/templates/blog/_c-blog-single-header.php'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-blog__container">
            <div class="l-blog">

                <div class="l-blog__content">

                    <?php include(get_template_directory().'/templates/blog/_c-blog-author.php'); ?>

                    <div class="h-wysiwyg-html">
                        <article class="c-article" data-scheme-target>
                            <?php the_content(); ?>
                        </article>
                    </div>


                    <?php
                    $post_categories = wp_get_post_categories($post->ID);
                    $post_tags = wp_get_post_tags($post->ID);
                    ?>

                    <?php if ($post_categories || $post_tags) {
                        ?>

                        <div class="c-blog-taxonomy">
                            <?php if ($post_categories) {
                            ?>

                                <div class="c-blog-taxonomy__item">

                                    <h5 class="c-blog-taxonomy__title">Article Categories</h5>
                                    <ul class="c-tags-ul">
                                        <?php
                                        foreach ($post_categories as $c) {
                                            $cat = get_category($c);
                                            $link = get_category_link($c); ?>
                                                <li><a href="<?php echo $link; ?>"><?php echo $cat->name; ?></a></li>
                                        <?php
                                        } ?>

                                    </ul>
                                </div>

                            <?php
                        } ?>

                            <?php if ($post_tags) {
                            ?>

                                <div class="c-blog-taxonomy__item">
                                    <h5 class="c-blog-taxonomy__title">Article Tags</h5>
                                    <ul class="c-tags-ul">
                                        <?php foreach ($post_tags as $tag) {
                                ?>
                                            <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                                        <?php
                            } ?>
                                    </ul>
                                </div>

                            <?php
                        } ?>
                        </div>

                    <?php
                    } ?>

                    <?php //echo \Swiss\share_page();?>

                </div>

                <div class="l-blog__sidebar" data-sticky="parent">
                    <?php include(get_template_directory().'/templates/blog/_sidebar.php'); ?>
                </div>

            </div>
        </div>
    </section>

    <?php endwhile; else: ?>

    <p><?php _e('Sorry, no posts matched your criteria.', 'swiss'); ?></p>

    <?php endif; ?>


    <section class="b-blog b-blog--space-above">
        <?php

        // amount of items pulled. Also sets the layout with data-column-count
        $amountOfPosts = 3;

        // Pulls posts according to the logic from lib/functions/blog.php
        $moreposts = \Evermade\Swiss\Blog\getPostsReadMore($amountOfPosts, $post->ID);

        ?>

        <div class="b-blog__container">
            <div class="h-wysiwyg-html">
                <hr>
                <h3>Read Next: <strong>Latest Articles</strong></h3>
            </div>
        </div>

        <div class="b-blog__container b-blog__container--wider">
            <div class="l-divided-spotlight" data-column-count="<?php echo $amountOfPosts; ?>">
                <div class="l-divided-spotlight__items">

                    <?php foreach ($moreposts as $post) {
            $my_post = new \Evermade\Swiss\Post($post); ?>

                        <div class="l-divided-spotlight__item">
                            <?php include(get_template_directory().'/templates/blog/_c-blog-post-big.php'); ?>
                        </div>

                    <?php
        } ?>

                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();

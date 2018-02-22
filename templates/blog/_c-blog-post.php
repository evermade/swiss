<div class="c-blog-post">

    <div class="c-blog-post__image">

        <div class="c-background-image" style="background-image:url(<?php echo $my_post->getFeaturedImage('hero-large'); ?>);"></div>

    </div>

    <div class="c-blog-post__text">

        <div class="h-wysiwyg-html" data-scheme-target>
            <h2 class="h3">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <p><?php echo the_excerpt(); ?></p>

            <a class="c-cta-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read Article', 'swiss'); ?></a>
            <p class="c-blog-post__date"><?php the_date(); ?></p>
        </div>
    </div>

</div><!-- end of c-post-small component -->

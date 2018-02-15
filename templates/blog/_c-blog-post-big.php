<div class="c-blog-post-big">

    <div class="c-blog-post-big__image">

        <div class="c-background-image" style="background-image:url(<?php echo $my_post->getFeatureImage('hero-large'); ?>);"></div>
        <div class="c-overlay"></div>

    </div>

    <div class="c-blog-post-big__text">

        <p class="c-blog-post-big__date"><?php the_date(); ?></p>

        <h2 class="h3">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <a class="c-cta-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read Article', 'swiss'); ?></a>

    </div>

</div><!-- end of c-post-small component -->

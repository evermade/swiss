<div class="c-blog-single-header">

    <div class="c-blog-single-header__back">
        <a href="/blog/">View all Posts</a>
    </div>

    <div class="c-blog-single-header__image">

        <div class="c-background-image" style="background-image:url(<?php echo $my_post->getFeaturedImage('hero-large'); ?>);"></div>
        <div class="c-overlay"></div>

    </div>

    <div class="c-blog-single-header__text">

        <p class="c-blog-single-header__date"><?php the_date(); ?></p>

        <h1>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>

    </div>

</div><!-- end of c-post-small component -->

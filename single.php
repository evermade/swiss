<?php get_header(); ?>

<?php if (have_posts()) : global $post; while (have_posts()) : the_post(); $my_post = new \Swiss\Post($post); ?>

</div>

<div class="scheme scheme--dark">
    <section class="b-hero">

        <div class="c-background-image" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>);"></div>

        <div class="c-overlay"></div>

        <div class="b-hero__container">
            <div class="b-hero__row">
                <div class="b-hero__content" data-column-size="8">
                    <div class="b-hero__wrapper">

                        <div class="h-wysiwyg-html">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <p class="accent"><?php the_date(); ?></p>
                        </div>

                    </div><!-- end of b-hero__wrapper -->
                </div><!-- end of b-hero__content -->
            </div><!-- end of b-hero__row -->
        </div><!-- end of b-hero__container -->
    </section><!-- end of b-hero -->
</div>

<div class="scheme">
 <section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="h-wysiwyg-html">
                                <?php the_content(); ?>
                            </div>

                            <?php echo \Swiss\share_page(); ?>
                        </div>
                    </div>

                </div><!-- end of b-base__wrapper -->
            </div><!-- end of b-base__content -->
        </div><!-- end of b-base__row -->
    </div><!-- end of b-base__container -->
</section><!-- end of b-base -->

<?php endwhile; else: ?>

<p><?php _e('Sorry, no posts matched your criteria.', 'swiss'); ?></p>

<?php endif; ?>

<?php get_footer();
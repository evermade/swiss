<?php

// this is the fallback template file if no other templates in the hierarchy are found

get_header();

?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div><!-- end of row -->
    </div><!-- end of wrapper -->
</section><!-- end of section -->

<?php get_footer();

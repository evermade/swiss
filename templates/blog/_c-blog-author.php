<?php if( is_single() ){?>

    <div class="c-blog-author">
        <div class="c-blog-author__avatar">
            <?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>

        </div>
        <div class="c-blog-author__text">
            <h5><strong>Written by </strong><?php echo the_author_link(); ?></h5>
            <p><?php echo get_the_author_meta('description'); ?></p>
        </div>

        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="c-blog-author__link"></a>
    </div>

<?php } ?>
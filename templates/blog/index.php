<?php global $wp_query; ?>

 <section class="b-blog s-context">

    <?php if ( have_posts() && ( get_search_query() || is_category() || is_date() || is_tag() || is_author() ) == false ): 

        // the amount of items in the spotlight
        $spotlightAmount = 3;
        ?>

        <div class="b-blog__container b-blog__container--wider">
            <div class="l-divided-spotlight" data-column-count="<?php echo $spotlightAmount; ?>">
                <div class="l-divided-spotlight__items">

                    <?php

                    $i = 0;

                    while ( have_posts() && $i < $spotlightAmount ): the_post();

                        $my_post = new \Swiss\Post($post);
                        ?>

                            <div class="l-divided-spotlight__item">
                                <?php include(get_template_directory().'/templates/blog/_c-blog-post-big.php'); ?>
                            </div>

                        <?php

                        $i++;

                    endwhile;

                    ?>

                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="b-blog__container b-blog__container--wider">
            <?php include(get_template_directory().'/templates/blog/_c-blog-header.php'); ?>
        </div>

    <?php endif; ?>

    <div class="b-blog__container">
        <div class="l-blog">

            <div class="l-blog__sidebar" data-swiss-sticky="parent" data-swiss-sticky-viewport="> 992">
                <?php include(get_template_directory().'/templates/blog/_sidebar.php'); ?>
            </div> 

            <div class="l-blog__content">
                <div class="l-blog__content__listing">
                    <?php

                    if ( have_posts() ):

                        while ( have_posts() ): the_post();

                            $my_post = new \Swiss\Post($post);

                            include(get_template_directory().'/templates/blog/_c-blog-post.php');

                        endwhile;

                    else: ?>

                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="b-blog__container">
        <?php echo paginate_links(['type'=>'list', 'prev_next'=>false]); ?>
    </div>
    
</section>
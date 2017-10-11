<section class="b-listing">

    <?php echo \Swiss\sprint('<div class="b-listing__container b-listing__container--intro"><div class="h-wysiwyg-html" data-scheme-target>%s</div></div>', $block->get('text')); ?>

    <div class="b-listing__container">

        <?php if(!empty($block->get('posts'))): ?>

            <div class="l-cards">

            <?php global $post; foreach($block->get('posts') as $k => $post): setup_postdata($post); ?>

                <div class="l-cards__item">
                    <?php echo \Swiss\template(get_post_type().'/_card.php', $post); ?>
                </div>

            <?php endforeach; wp_reset_postdata(); ?>

            </div>

        <?php endif; ?>

        <?php if($block->get('see_more')): ?>
            <div class="b-listing__see-more">
                <a href="<?php echo $block->get('see_more_url'); ?>" class="c-btn"><?php echo $block->get('see_more_text'); ?></a>
            </div>
        <?php endif; ?>

    </div><!-- end of b-listing__container -->
</section><!-- end of b-listing -->

<section class="b-cards">

    <?php echo \Swiss\sprint('<div class="c-background-image" style="background-image:url(%s);"></div><div class="c-overlay"></div>', \Swiss\Acf\getImageUrl('large', $block->get('background_image'))); ?>

    <div class="b-cards__container">
        <div class="b-cards__row">
            <div class="b-cards__content">
                <div class="b-cards__wrapper">

                    <?php echo \Swiss\sprint('<div class="b-cards__intro"><div class="h-wysiwyg-html" data-scheme-target>%s</div></div>', $block->get('text')); ?>

                    <?php if(!empty($block->get('posts'))): ?>

                        <div class="l-cards" data-column-count="<?php echo sizeof($block->get('posts')); ?>">

                        <?php global $post; foreach($block->get('posts') as $k => $post): setup_postdata($post); ?>

                            <div class="l-cards__item">
                                <?php echo \Swiss\template('_card-sample.php', $post); ?>
                            </div>

                        <?php endforeach; wp_reset_postdata(); ?>

                        </div>

                    <?php endif; ?>

                </div><!-- end of b-cards__wrapper -->
            </div><!-- end of b-cards__content -->
        </div><!-- end of b-cards__row -->
    </div><!-- end of b-cards__container -->
</section><!-- end of b-cards -->

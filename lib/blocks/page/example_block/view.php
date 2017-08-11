<section class="b-base">

    <?php echo \Swiss\sprint('<div class="c-background-image" style="background-image:url(%s);"></div><div class="c-overlay"></div>', \Swiss\Acf\getImageUrl('large', $block->get('background_image'))); ?>

    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                    <?php
                        /*
                            * DEMO CODE, PLEASE ADJUST ACCORDINGLY!
                            * This is where you put your layouts and components
                            * Try to use templates and functions as much as you can
                        */
                    ?>

                    <?php echo \Swiss\sprint('<div class="h-wysiwyg-html">%s</div>', $block->get('text')); ?>

                    <?php if(!empty($block->get('posts'))): ?>

                        <div class="l-columns" data-column-count="<?php echo sizeof($block->get('posts')); ?>">

                        <?php global $post; foreach($block->get('posts') as $k => $post): setup_postdata($post); ?>

                            <div class="l-columns__item">
                                <?php echo \Swiss\template('_card-sample.php', $post); ?>
                            </div>

                        <?php endforeach; wp_reset_postdata(); ?>

                        </div>

                    <?php endif; ?>

                </div><!-- end of b-base__wrapper -->
            </div><!-- end of b-base__content -->
        </div><!-- end of b-base__row -->
    </div><!-- end of b-base__container -->
</section><!-- end of b-base -->

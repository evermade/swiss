<section class="b-image-text b-image-text--<?php echo $block->get('layout'); ?> b-image-text--<?php echo $block->get('background_image_mode'); ?>">

    <div class="b-image-text__image" style="background-image: url(<?php echo \Swiss\Acf\get_image('large', $block->get('image'), 'url'); ?>);"></div>

    <div class="container">
        <div class="row">
            <div class="b-image-text__text">
                <div class="h-wysiwyg-html"><?php echo $block->get('text'); ?></div>
            </div>
        </div><!-- end of row -->
    </div><!-- end of wrapper -->

</section>
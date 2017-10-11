<section class="b-image-text b-image-text--<?php echo $block->get('layout'); ?> b-image-text--vert-<?php echo $block->get('image_foreground_vertical_alignment'); ?>">

    <div class="b-image-text__image-area" data-animate="animated" style="<?php echo $imageAreaCSS; ?>">
        <?php echo $imageForeground; ?>
    </div>

    <div class="b-image-text__container">
        <div class="b-image-text__text">
            <div class="h-wysiwyg-html" data-scheme-target><?php echo $block->get('text'); ?></div>
        </div>
    </div><!-- end of wrapper -->

</section>

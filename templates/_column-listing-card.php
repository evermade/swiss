<div class="c-column-listing-card c-column-listing-card--<?php echo $block->get('image_type'); ?>">

    <div class="c-column-listing-card__image">
        <div class="c-column-listing-card__image__inner" style="background-image: url(<?php echo \Swiss\Acf\getImageUrl('medium-large', \Swiss\getFrom('image', $v)); ?>)"></div>
    </div>

    <h3 class="c-column-listing-card__title"><?php echo \Swiss\getFrom('title', $v); ?></h3>

    <?php echo \Swiss\sprint('<div class="c-column-listing-card__text"><div class="h-wysiwyg-html">%s</div></div>', \Swiss\getFrom('text', $v)); ?>

</div>

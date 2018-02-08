<div class="c-column-listing c-column-listing--<?php echo $block->get('image_type'); ?>" data-scheme-target>

    <div class="c-column-listing__image">
        <div class="c-column-listing__image__inner" style="background-image: url(<?php echo \Evermade\Swiss\Acf\getImageUrl('medium-large', \Evermade\Swiss\getFrom('image', $v)); ?>)"></div>
    </div>

    <h3 class="c-column-listing__title"><?php echo \Evermade\Swiss\getFrom('title', $v); ?></h3>

    <?php echo \Evermade\Swiss\sprint('<div class="c-column-listing__text"><div class="h-wysiwyg-html">%s</div></div>', \Evermade\Swiss\getFrom('text', $v)); ?>

</div>

<section class="b-columns-listing">

    <?php echo \Swiss\sprint('<div class="b-columns-listing__container b-columns-listing__container--intro"><div class="h-wysiwyg-html" data-scheme-target>%s</div></div>', $block->get('text')); ?>

    <div class="b-columns-listing__container">
        <div class="l-cards">

        <?php foreach($block->get('columns') as $k => $v): ?>

            <div class="l-cards__item">
                <?php include get_template_directory().'/templates/_column-listing-card.php'; ?>
            </div>

        <?php endforeach; ?>

        </div>

    </div><!-- end of b-columns-listing__container -->

</section><!-- end of b-columns-listing -->

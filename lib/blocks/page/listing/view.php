<section class="b-listing">

    <?php echo \Swiss\sprint('<div class="b-listing__container b-listing__container--intro"><div class="h-wysiwyg-html" data-scheme-target>%s</div></div>', $block->get('text')); ?>

    <div class="b-listing__container">
        <div class="l-cards">

        <?php foreach($block->get('columns') as $k => $v): ?>

            <div class="l-cards__item">
                <?php include get_template_directory().'/templates/_column-listing.php'; ?>
            </div>

        <?php endforeach; ?>

        </div>

    </div><!-- end of b-listing__container -->

</section><!-- end of b-listing -->

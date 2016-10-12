<section class="b-hero">

    <div class="c-background-image" <?php echo $hero_background; ?>></div>

    <div class="c-overlay"></div>

    <div class="b-hero__container">
        <div class="b-hero__row">
            <div class="b-hero__content" data-column-size="8">
                <div class="b-hero__wrapper">
                    <?php echo \Swiss\sprint('<div class="wysiwyg-html scheme scheme--inverted">%s</h2>', $hero['slide_text']); ?>
                </div><!-- end of b-hero__wrapper -->
            </div><!-- end of b-hero__content -->
        </div><!-- end of b-hero__row -->
    </div><!-- end of b-hero__container -->

</section><!-- end of b-hero -->

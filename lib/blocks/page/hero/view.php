<section class="b-hero">

    <div class="c-background-image" <?php echo $hero_background; ?>></div>

    <?php echo \Swiss\sprint('<div class="c-youtube-api-player js-youtube-api-player" data-video-id="%s" data-autoplay="1" data-autoplay-viewport="1" data-loop="1" data-sound="0" data-cover="1"></div>', \Swiss\get_from('youtube_id', $hero)); ?>

    <?php if(\Swiss\get_from('overlay', $hero)): ?>
    <div class="c-overlay"></div>
    <?php endif; ?>

    <div class="b-hero__container">
        <div class="b-hero__row">
            <div class="b-hero__content" data-column-size="8">
                <div class="b-hero__wrapper">
                    <?php echo \Swiss\sprint('<div class="h-wysiwyg-html">%s</h2>', \Swiss\get_from('text', $hero)); ?>
                </div><!-- end of b-hero__wrapper -->
            </div><!-- end of b-hero__content -->
        </div><!-- end of b-hero__row -->
    </div><!-- end of b-hero__container -->

</section><!-- end of b-hero -->

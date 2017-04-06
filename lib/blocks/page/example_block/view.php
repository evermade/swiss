<section class="b-base">

    <div class="c-background-image" style="background-image:url(<?php echo \Swiss\default_img('hero-large'); ?>);"></div>

    <div class="c-overlay"></div>

    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                    <!-- this is where you put your layouts and components -->

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">

                            <div class="wysiwyg-html scheme scheme--inverted">

                                <?php echo \Swiss\sprint('<h1 class="section-header__title">%s</h1>', str_replace(get_template_directory(), '',  __DIR__)); ?>

                                <h2>Wooo! This block works :)</h2>
                                <p>Your seeing this message as the view has been loaded succesfully from <b><?php echo str_replace(get_template_directory(), '',  __DIR__); ?></b>.</p>
                                <p>For development:</p>
                                <ol>
                                <li>Duplicate this block folder and rename accordingly to naming convention typically of how you named the ACF block.</li>
                                <li>If you need Javascript for this block then duplicate <b>/assets/js/components/example.js</b> and rename the file and the object key <b>example</b> to the name of your module.</li>
                                </ol>

                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-6">

                            <div class="wysiwyg-html scheme scheme--inverted">
                                <h2>Helpers</h2>
                                <p>From here you can see we are using the <strong>wysiwyg-html</strong> class to restore basic html element styles.</p>

                                <p>We also use our css schemes, for example to invert text if background image is in use, so check /assets/css/scss/base/_scheme.scss for more.</p>
                            </div>

                        </div>
                    </div><!-- end of row -->

                </div><!-- end of b-base__wrapper -->
            </div><!-- end of b-base__content -->
        </div><!-- end of b-base__row -->
    </div><!-- end of b-base__container -->
</section><!-- end of b-base -->
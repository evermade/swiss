<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                    <div class="l-columns" data-column-count="3">

                        <?php for ($i=0; $i < 3; $i++): ?>
                        <div class="l-columns__item">
                            <div class="h-wysiwyg-html text-center">

                                <img src="<?php echo \Swiss\default_img('medium'); ?>" alt="image">

                                <h2>Blocking listing item</h2>

                                <p>This is simply the base block (b-base) with the columns layout within. Within our columns we only using normal DOM elements, and/or our components.</p>

                                <p><a href="#" class="c-btn">A Button</a></p>

                            </div>
                        </div>
                        <?php endfor; ?>

                    </div><!-- end of l-columns layout -->

                </div>
            </div>
        </div>
    </div>
</section>
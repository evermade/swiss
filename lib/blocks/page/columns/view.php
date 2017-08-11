<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                <?php if(!empty($block->get('columns'))): foreach(array_chunk($block->get('columns'), $block->get('per_row', 'data')) as $set): ?>

                    <div class="l-columns" data-column-count="<?php echo sizeof($set); ?>">

                        <?php foreach($set as $p):  ?>

                        <div class="l-columns__item">
                            <div class="h-wysiwyg-html">
                                 <?php echo \Swiss\get_from('column', $p); ?>
                            </div>
                        </div>

                        <?php endforeach; ?>

                    </div><!-- end of l-columns layout -->

                <?php endforeach; endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

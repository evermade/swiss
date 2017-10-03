<section class="b-base">
    <div class="b-base__container"> 

        <?php if(!empty($block->get('columns'))): foreach(array_chunk($block->get('columns'), $block->get('per_row', 'data')) as $set): ?>

            <div class="l-columns <?php echo $blockExtraClass; ?>" data-column-count="<?php echo sizeof($set); ?>">

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
</section>

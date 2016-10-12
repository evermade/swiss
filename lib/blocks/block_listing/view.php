<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

					<div class="l-columns" data-column-count="<?php echo sizeof($block->repeaters['block_listing_items']); ?>">

						<?php if(!empty($block->repeaters['block_listing_items'])): foreach($block->repeaters['block_listing_items'] as $k => $p): 	?>				
						<div class="l-columns__item">
							<div class="c-wysiwyg-html">
							<?php echo \Swiss\image($p['block_listing_item_image'], 'medium-large', 'img'); ?>
							<?php echo \Swiss\sprint('<h2 class="">%s</h2>', $p['block_listing_item_title']); ?>
							<?php echo \Swiss\sprint('<div class="">%s</div>', $p['block_listing_item_text']); ?>
							</div>
						</div>					

						<?php endforeach; endif; ?>

					</div><!-- end of l-columns layout -->

                </div>
            </div>
        </div>
    </div>
</section>
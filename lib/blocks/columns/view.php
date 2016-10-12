<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">

                <?php if(!empty($block->repeaters['columns_columns'])): foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>

					<div class="l-columns" data-column-count="<?php echo sizeof($set); ?>">

						<?php foreach($set as $p): 	?>				
						<div class="l-columns__item">
                            <div class="wysiwyg-html">
							     <?php echo $p['column']; ?>
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
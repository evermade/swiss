<section class="b-section">
    <div class="b-section__container">
        <div class="b-section__row">
            <div class="b-section__content">
                <div class="b-section__wrapper">

                <?php if(!empty($block->repeaters['columns_columns'])): foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>

					<div class="l-columns" data-column-count="<?php echo sizeof($set); ?>">

						<?php foreach($set as $p): 	?>				
						<div class="l-columns__item">
                            <div class="c-wysiwyg-html">
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
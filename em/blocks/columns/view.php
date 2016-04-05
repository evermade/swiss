  <section class="columns-block <?php echo $block->getCss('section');?>">
	
	<div class="columns-block__container">
		
		<?php if (!empty($block->fields['columns_title'])): ?>
		<header class="section-header section-header--centered">
	        <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['columns_title']); ?>
	    </header>
		<?php endif; ?>

		 <div class="columns" data-count="<?php echo sizeof($block->repeaters['columns_columns']); ?>">
			<div class="columns__container">

				<?php if(is_array($block->repeaters['columns_columns']) && !empty($block->repeaters['columns_columns'])): foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>
					<div class="columns__row columns__row--align-<?php echo $block->get('columns_vertical_alignment', 'fields');?>">
						<?php foreach($set as $p): 	?>				
						<div class="columns__item">
							<div class="el"><?php echo $p['column']; ?></div>
						</div>						
						<?php endforeach; ?>
					</div><!-- end of row -->
				<?php endforeach; endif; ?>

			</div><!-- end of wrapper -->
		</div><!-- end of columns -->

	</div>

 </section><!-- end of columns-block -->
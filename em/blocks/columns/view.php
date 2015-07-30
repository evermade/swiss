 <section class="columns<?php echo $block->getCss('section');?>" style="<?php echo $block->getCss('columns_background'); ?>" data-count="<?php echo sizeof($block->repeaters['columns_columns']); ?>">
	<div class="columns__container">

		<?php if (!empty($block->fields['columns_title'])): ?>
		<header class="section-header section-header--columns">
	        <?php echo Helper::sprint('<h1 class="section-columns__header__title">%s</h1>', $block->fields['columns_title']); ?>
	    </header>
		<?php endif; ?>

		<?php foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>
			<div class="columns__row columns__row--align-<?php echo $block->get('columns_vertical_alignment', 'fields');?>">
				<?php foreach($set as $p): 	?>				
				<div class="columns__item columns__item--type-<?php echo $p['column_type'];?> <?php echo $block->get('columns_columns_grid_columns');?>">
					<div class="el"><?php echo $p['column']; ?></div>
				</div>						
				<?php endforeach; ?>
			</div><!-- end of row -->
		<?php endforeach; ?>

	</div><!-- end of wrapper -->
</section><!-- end of section -->
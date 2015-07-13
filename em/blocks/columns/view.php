 <section class="columns columns--stagger<?php echo $block->getCss('section');?>" style="<?php echo $block->getCss('columns_background'); ?>" data-count="<?php echo sizeof($block->repeaters['columns_columns']); ?>">
	<div class="container">

		<?php if (!empty($block->fields['columns_title'])): ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<header class="columns__header">
		        <h1 class="columns__header__title"><?php echo $block->fields['columns_title']; ?></h1>
		    </header>
			</div>
		</div> 
		<?php endif ?>

		<?php foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>
			<div class="columns__row columns__row--align-<?php echo $block->get('columns_vertical_alignment', 'fields');?>">
				<?php foreach($set as $p): 	?>				
				<div class="columns__item columns__item--type-<?php echo $p['column_type'];?> <?php echo $block->get('columns_columns_grid_columns');?>">
					<div class="el">
						<?php echo $p['column']; ?>
					</div>
				</div>						
				<?php endforeach; ?>
			</div><!-- end of row -->
		<?php endforeach; ?>
	
	</div><!-- end of wrapper -->

</section><!-- end of section --> 
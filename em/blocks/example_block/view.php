<section class="section<?php echo $block->getCss('section');?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php echo $block->get('field_name'); ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				
			<?php foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>
				<div class="row">
					<?php foreach($set as $p): 	?>				
					<div class="<?php echo $block->get('columns_columns_grid_columns');?>">
						<?php echo $p['column']; ?>
					</div>						
					<?php endforeach; ?>
				</div><!-- end of row -->
			<?php endforeach; ?>

			</div>
		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
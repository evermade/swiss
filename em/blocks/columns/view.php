 <section class="columns <?php echo $block->displayClasses('section');?>" style="<?php echo $block->styles['columns_background']; ?>">
	<div class="container clearfix">
		<?php foreach(array_chunk($block->repeaters['columns_columns'], $block->data['per_row']) as $set): ?>
			<div class="row">
				<?php foreach($set as $p): 	?>				
				<div class="<?php echo $block->get('columns_columns_grid_columns');?>">
					<?php echo $p['column']; ?>
				</div>						
				<?php endforeach; ?>
			</div><!-- end of row -->
		<?php endforeach; ?>
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
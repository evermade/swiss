 <section class="columns <?php echo $block->displayClasses('section');?>" style="<?php echo $block->styles['columns_background']; ?>">
	<div class="container clearfix">
		<?php foreach(array_chunk($block->repeater_blocks, $block->data['per_row']) as $set): ?>
			<div class="row">
				<?php 
				foreach($set as $p): 

				//lets setup the column classes if overwritten
				$p['column_grid_columns'] = (!empty($p['column_class']))? $p['column_class'] : 'col-xs-12 '.$block->data['grid_columns'];

				?>				
				<div class="<?php echo $p['column_grid_columns'];?>">
					<?php echo $p['column']; ?>
				</div>						
				<?php endforeach; ?>
			</div><!-- end of row -->
		<?php endforeach; ?>
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
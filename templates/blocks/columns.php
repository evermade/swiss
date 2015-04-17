<?php 
	//lets keep block data in class for encapsulation and stopping conflicts across blocks
	$block = new Block;

	//set and get the acf fields for this block
	$block->set_fields(array('columns_id', 'columns_background', 'columns_text_color', 'columns_animation'));
	$block->get_fields();

	//set and get the repeater columns for this post
	$block->setup_repeater_field('columns_columns');

	//how many per row
	$block->data['per_row'] = 99;

	//setup background image for main section block
	$block->setup_background_image('columns_background');

	//set an identifer for use in css
	$block->fields['columns_id'] = (!empty($block->fields['columns_id']))? ' '.$block->fields['columns_id'] : null;

	$block->addClass($block->fields['columns_text_color'], 'section');
	$block->addClass($block->fields['columns_id'], 'section');
?>
 <section class="<?php echo $block->displayClasses('section');?>" style="<?php echo $block->styles['columns_background']; ?>">
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
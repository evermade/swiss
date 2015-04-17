<?php 
	//lets keep block data in class for encapsulation and stopping conflicts across blocks
	$block = new Block;

	//set and get the fields for this post
	$block->set_fields(array('posts'));
	$block->get_fields();

	$block->data['grid_columns'] = em::number_of_columns(sizeof($block->fields['posts']));
	$block->data['per_row'] = 99;
?>
<section class="section">
	<div class="container clearfix">
		<?php global $post; foreach(array_chunk($block->fields['posts'], $block->data['per_row']) as $set): ?>
			<div class="row">
			<?php foreach($set as $post): setup_postdata($post); 

			//now lets get any ACF on this post object
			$post_block = new Block;

			//set and get the fields for this post
			$post_block->fields = array('test');
			$post_block->get_fields(false);//false signals we need to use the native get_fields as its not a sub field at this level
			?>
			
			<div class="col-xs-12 col-sm-<?php echo $block->data['grid_columns'];?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php the_excerpt(); ?>
				<?php if($post_block->fields['test']): ?><strong><?php echo $post_block->fields['test']; ?></strong><?php endif; ?>
				<p><a href="<?php the_permalink(); ?>" class="button red">Read More</a></p>
			</div>
					
			<?php wp_reset_postdata(); endforeach; ?>
			</div><!-- end of row -->
		<?php endforeach; ?>
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
<?php
global $post; 
?>
<section class="section">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12">
				<h2>Posts</h2>
			</div>
		</div>

		<?php if(!empty($block->data['posts'])): foreach(array_chunk($block->data['posts'], $block->data['per_row']) as $set): ?>

			<div class="row">

				<?php foreach($set as $post): setup_postdata($post); 

				//now lets get any ACF on this post object
				$post_block = new Block;

				//set and get the fields for this post
				$post_block->get_fields(array('test'), false);//false signals we need to use the native get_fields as its not a sub field at this level
				?>
				
				<div class="col-xs-12 col-sm-6 col-md-<?php echo $block->data['grid_columns'];?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<?php if($post_block->fields['test']): ?><strong><?php echo $post_block->fields['test']; ?></strong><?php endif; ?>
					<p><a href="<?php the_permalink(); ?>">Read More</a></p>
				</div>
						
				<?php endforeach; ?>

			</div><!-- end of row -->

		<?php endforeach; wp_reset_postdata(); ?>

		<?php else: ?>

		<div class="row">
			<div class="col-xs-12">
				<p>No posts found.</p>
			</div>
		</div>
	
		<?php endif; ?>

	</div><!-- end of wrapper -->
</section><!-- end of section --> 
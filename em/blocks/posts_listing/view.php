<?php
global $post; 
?>
<section class="posts-listing">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12">
				<h1 class="posts-listing__title">Posts</h1 class="posts-listing__title">
			</div>
		</div>

		<?php if(!empty($block->data['posts'])): foreach(array_chunk($block->data['posts'], $block->data['per_row']) as $set): ?>

			<div class="row">

			<div class="col-xs-12">

				<?php foreach($set as $post): setup_postdata($post); 

				//now lets get any ACF on this post object
				$post_block = new Block;

				//set and get the fields for this post
				$post_block->get_fields(array('test'), false);//false signals we need to use the native get_fields as its not a sub field at this level
				
				include(get_template_directory().'/templates/post-small.php');

				endforeach; ?>

			</div>

			</div><!-- end of row -->

		<?php endforeach; wp_reset_postdata(); ?>

		<?php else: ?>

		<div class="row">
			<div class="col-xs-12 text-center">
				<p>No posts found.</p>
			</div>
		</div>
	
		<?php endif; ?>

	</div><!-- end of wrapper -->
</section><!-- end of section --> 
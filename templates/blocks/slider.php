<?php 
	//lets keep block data in class for encapsulation and stopping conflicts across blocks
	$block = new Block;

	//set and get the repeater columns for this post
	$block->setup_repeater_field('slider_slides');

	//how many per row
	$block->data['per_row'] = 99;

?>
 <section>
	<div class="slideshow clearfix">
		<?php foreach($block->repeater_blocks as $k => $p): ?>				
		<div class="slideshow__slide" style="background-image: url('<?php echo $p['slide_image']['url'] ?>'); background-size: cover;">
			<div class="container">
			<?php echo $p['slide_content'] ?>
			</div>
		</div>						
		<?php endforeach; ?>
	</div><!-- end of wrapper -->
</section><!-- end of section -->
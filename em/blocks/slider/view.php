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
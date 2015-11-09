<?php
	//to help debug and show what you have access to
	//echo "<pre>"; print_r($block->repeaters['gallery_images']); echo "</pre>";
?>
<section class="grid grid--no-gutter">
	<div class="grid__container">

		<div class="grid__row" data-count="4">

			<?php $count=0; foreach($block->repeaters['gallery_images'] as $k => $image): ?>
			<div class="grid__item">

				<div class="gallery-item" data-animate="animated bounceIn animateddelay<?php echo $count;?>">
					<div class="gallery-item__image" style="background-image: url(<?php echo $image['sizes']['medium-large'] ?>);">
					</div>
					<div class="gallery-item__caption">
						<div class="gallery-item__caption__inner">
							<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>.</p>
						</div>
					</div><!-- end of gallery caption -->
				</div><!-- end of gallery item -->

			</div><!-- end of grid item -->
			<?php $count = ($count==3)? 0 : $count+1; endforeach; ?>

		</div><!-- end of grid row -->
	
	</div><!-- end of grid container -->
</section><!-- end of grid --> 
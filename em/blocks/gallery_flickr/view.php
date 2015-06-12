<section class="gallery-flickr<?php echo $block->getCss('section');?>">
	<div class="gallery-flickr__images">

		<?php foreach($block->repeaters['gallery_images'] as $k => $image): ?>
			<!-- Thumbnail -->
				<div class="gallery-flickr__item js-gallery-flickr__item gallery-flickr__item--loading">
					<img src="<?php echo $image['sizes']['medium-large'] ?>" data-width="<?php echo $image['sizes']['medium-large-width'] ?>" data-height="<?php echo $image['sizes']['medium-large-height'] ?>" alt="<?php echo $image['caption']; ?>" class="gallery-flickr__item__image">
				</div>
		<?php endforeach; ?>
	</div>

</section><!-- end of section --> 
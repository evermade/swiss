<?php
	//to help debug and show what you have access to
	//echo "<pre>"; print_r($block->repeaters['gallery_images']); echo "</pre>";
?>
<section class="gallery gallery--flickr<?php echo $block->getCss('section');?>">
	<div class="gallery__container">

		<header class="section-header">
		    <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['gallery_title']); ?>
		</header>

		<div class="gallery__images">
			<?php foreach($block->repeaters['gallery_images'] as $k => $image): ?>
				<div class="gallery__item js-gallery__item gallery__item--loading">
					<img src="<?php echo $image['sizes']['medium-large'] ?>" data-width="<?php echo $image['sizes']['medium-large-width'] ?>" data-height="<?php echo $image['sizes']['medium-large-height'] ?>" alt="<?php echo $image['caption']; ?>" class="gallery__item__image">
				</div><!-- end of gallery item -->
			<?php endforeach; ?>
		</div><!-- end of gallery images -->

	</div><!-- end of gallery container -->
</section><!-- end of gallery section -->
<?php
	//to help debug and show what you have access to
	//echo "<pre>"; print_r($block->repeaters['gallery_images']); echo "</pre>";
?>
<section class="gallery gallery--flickr<?php echo $block->getCss('section');?>">

<?php echo Helper::sprint('<header class="gallery__header"><h1 class="gallery__header__title">%s</h1></header>', $block->fields['gallery_title']); ?>

	<div class="gallery__images">

		<?php foreach($block->repeaters['gallery_images'] as $k => $image): ?>
			<!-- Thumbnail -->
				<div class="gallery__item js-gallery__item gallery__item--loading">
					<img src="<?php echo $image['sizes']['medium-large'] ?>" data-width="<?php echo $image['sizes']['medium-large-width'] ?>" data-height="<?php echo $image['sizes']['medium-large-height'] ?>" alt="<?php echo $image['caption']; ?>" class="gallery__item__image">
				</div>
		<?php endforeach; ?>
	</div>

</section><!-- end of section --> 
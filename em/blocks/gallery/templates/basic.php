<?php
	//to help debug and show what you have access to
	//echo "<pre>"; print_r($block->repeaters['gallery_images']); echo "</pre>";
?>

<section class="gallery gallery--basic<?php echo $block->getCss('section');?>">
	<div class="gallery__container">
		
	<?php echo Helper::sprint('<header class="gallery__header"><h1 class="gallery__header__title">%s</h1></header>', $block->fields['gallery_title']); ?>

		<div class="gallery__images">

		<?php foreach($block->repeaters['gallery_images'] as $k => $image): ?>
			<div class="gallery__item">
				<div class="gallery__item__image" style="background-image: url(<?php echo $image['sizes']['medium-large'] ?>);">
				</div>
				<div class="gallery__item__caption">
					<div class="gallery__item__caption__inner">
						<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>.</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
			
		</div><!-- end of gallery content -->
	</div><!-- end of gallery container -->
</section><!-- end of gallery --> 
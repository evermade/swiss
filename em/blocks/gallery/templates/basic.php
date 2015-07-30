<?php
	//to help debug and show what you have access to
	//echo "<pre>"; print_r($block->repeaters['gallery_images']); echo "</pre>";
?>

<section class="gallery gallery--basic<?php echo $block->getCss('section');?>">
	<div class="gallery__container">

		<header class="section-header">
	        <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['gallery_title']); ?>
	    </header>

		<div class="gallery__images">
		<?php foreach($block->repeaters['gallery_images'] as $k => $image): ?>
			<div class="gallery__item">
				<div class="gallery__item__image" style="background-image: url(<?php echo $image['sizes']['medium-large'] ?>);">
				</div>
				<div class="gallery__item__caption">
					<div class="gallery__item__caption__inner">
						<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>.</p>
					</div>
				</div><!-- end of gallery caption -->
			</div><!-- end of gallery item -->
		<?php endforeach; ?>
			
		</div><!-- end of gallery images -->
	</div><!-- end of gallery container -->
</section><!-- end of gallery section--> 
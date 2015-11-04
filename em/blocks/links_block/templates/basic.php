<div class="links-block__item">

	<?php echo Helper::sprint('<div class="links-block__item__background" style="%s"></div>', $link_block->getCss('links_block_item_background')); ?>

	<div class="links-block__item__overlay"></div>
			                	
	<div class="links-block__item__content">
		<?php echo Helper::sprint('<h2><a href="%s">%s</a></h2>', [$p['links_block_item_link'], $p['links_block_item_title']]); ?>
		<?php echo Helper::sprint('<div>%s</div>', $p['links_block_item_text']); ?>
		<?php echo Helper::sprint('<a href="%s" class="btn">Read More</a>', $p['links_block_item_link']); ?>
	</div>

</div><!-- end of links block item -->
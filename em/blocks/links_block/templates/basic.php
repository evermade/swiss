<?php
	//this is the obj we have access to
	//echo "<pre>"; print_r($link_block); echo "</pre>";
	//Helper::js_log($link_block); 
?>

<div class="links-block__item">

	<?php echo Helper::sprint('<div class="links-block__item__background" style="%s"></div>', $link_block->getCss('links_block_item_background')); ?>

	<div class="links-block__item__overlay"></div>
			                	
	<div class="links-block__item__image"></div>

	<div class="links-block__item__content">
		<?php echo Helper::sprint('<h2 class="links-block__item__title"><a href="%s">%s</a></h2>', [$p['links_block_item_link'], $p['links_block_item_title']]); ?>
		<?php echo Helper::sprint('<div class="links-block__item__text">%s</div>', $p['links_block_item_text']); ?>
		<?php echo Helper::sprint('<a href="%s" class="links-block__item__btn">Read More</a>', $p['links_block_item_link']); ?>
		<a href="<?php echo $p['links_block_item_link'];?>" title="<?php echo $p['links_block_item_title'];?>" class="links-block__item__link links-block__item__link--abs"></a>
	</div>

</div><!-- end of links block item -->
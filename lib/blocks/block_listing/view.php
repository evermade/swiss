<section class="block-listing">	
	<div class="block-listing__container">

	    <header class="section-header section-header--centered" <?php \Swiss\animate('', ['el-up']); ?>>
	        <?php echo \Swiss\sprint('<h1 class="section-header__title">%s</h1>', $block->fields['block_listing_title']); ?>
	    </header>

	    <div class="block-listing__row" data-count="<?php echo sizeof($block->repeaters['block_listing_items']); ?>">
			
			<?php $counter = 0; foreach($block->repeaters['block_listing_items'] as $k => $p): ?>	
			<div class="block-listing__item" data-animate="animated bounceIn animateddelay<?php echo $counter;?>">
	    		<?php echo \Swiss\image($p['block_listing_item_image'], 'medium-large', 'block-listing__item__image'); ?>
				<?php echo \Swiss\sprint('<h2 class="block-listing__item__title">%s</h2>', $p['block_listing_item_title']); ?>
				<?php echo \Swiss\sprint('<div class="block-listing__item__content">%s</div>', $p['block_listing_item_text']); ?>
	    	</div><!-- end of block listing item -->
			<?php ++$counter; endforeach; ?>
	    	
	    </div><!-- end of block listing row -->
    </div><!-- end of block listing container -->
</section><!-- end of block listing section-->
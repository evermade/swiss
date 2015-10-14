<section class="block-listing">	
	<div class="block-listing__container">

	    <header class="section-header section-header--centered" <?php Helper::animate('', ['el-up']); ?>>
	        <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['block_listing_title']); ?>
	    </header>

	    <div class="block-listing__row" <?php Helper::animate('', ['el-up']); ?> data-count="<?php echo sizeof($block->repeaters['block_listing_items']); ?>">
			
			<?php foreach($block->repeaters['block_listing_items'] as $k => $p): 	?>	
			<div class="block-listing__item">
	    		<?php echo Helper::image($p['block_listing_item_image'], 'medium-large', 'block-listing__item__image'); ?>
				<?php echo Helper::sprint('<h2 class="block-listing__item__title">%s</h2>', $p['block_listing_item_title']); ?>
				<?php echo Helper::sprint('<div class="block-listing__item__content">%s</div>', $p['block_listing_item_text']); ?>
	    	</div><!-- end of block listing item -->
			<?php endforeach; ?>
	    	
	    </div><!-- end of block listing row -->
    </div><!-- end of block listing container -->
</section><!-- end of block listing section-->
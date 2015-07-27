<section class="block-listing">
	
	<div class="block-listing__container">

		<header class="block-listing__header" <?php Helper::animate('', ['el-up']); ?>>
	        <h1 class="block-listing__header__title"><?php echo $block->fields['block_listing_title']; ?></h1>
	    </header>

	    <div class="block-listing__row" <?php Helper::animate('', ['el-up']); ?>>
			
			<?php foreach($block->repeaters['block_listing_blocks'] as $k => $p): 	?>	
			<div class="block-listing__item">
	    		<?php echo Helper::image($p['block_listing_block_image'], 'medium-large', 'block-listing__item__image'); ?>
				<?php echo Helper::sprint('<div class="block-listing__item__content">%s</div>', $p['block_listing_block_text']); ?>
	    	</div>
			<?php endforeach; ?>
	    	
	    </div>

    </div>
</section><!-- end of block listing -->
<section class="block-listing">
	<div class="container">

		<?php if(!empty($block->fields['block_listing_title'])): ?>
	 	<div class="block-listing__header">
			<div class="block-listing__header__column">
				<h2 class="heading block-listing__title"><?php echo $block->fields['block_listing_title']; ?></h2>
			</div>
		</div> 
		<?php endif; ?>

		<div class="block-listing__blocks">
			<?php foreach($block->repeaters['block_listing_blocks'] as $k => $p): 	?>		

			<div class="block-listing__block <?php echo $block->get('block_listing_blocks_grid_columns');?>">

				<?php if(is_array($p['block_listing_block_image'])): ?>
					<img src="<?php echo $p['block_listing_block_image']['sizes']['medium-large']; ?>" alt="<?php echo $p['block_listing_block_image']['caption']; ?>" class="block-listing__block__image">
				<?php endif; ?>

				<h3 class="block-listing__block__title"><?php echo $p['block_listing_block_title']; ?></h3>

				<div class="block-listing__block__title">
					<?php echo $p['block_listing_block_text']; ?>
				</div>

			</div><!-- end of block listing block -->

			<?php endforeach; ?>
		</div>
	</div>
</section><!-- block-listing -->
<section class="logo-listing">

	<div class="logo-listing__container">

		<header class="section-header">
	        <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['listing_title']); ?>
	    </header>

			<?php echo Helper::sprint('<div class="logo-listing__text">%s</div>', $block->fields['listing_text']); ?>

			<div class="logo-listing__lists">

			<?php foreach ($block->repeaters['listing_list'] as $key => $list): ?>

				<div class="logo-listing__list">

				<?php foreach(array_chunk($list['list_images'], $block->data['per_row']) as $set): ?>
					
					<?php echo Helper::sprint('<h2 class="logo-listing__list__title">%s</h2>', $list['list_title']); ?>

						<div class="logo-listing__list__images">
						
						<?php foreach($set as $item): ?>
							<div class="logo-listing__list__image" <?php Helper::animate('', ['el-up']); ?>>

								<div class="logo-listing__list__image__inner" style="background-image: url(<?php echo $item['sizes']['logo-listing']; ?>);">
								</div>

							</div> <!-- end of logo-listing image -->
						<?php endforeach; ?>

						</div><!-- end of logo-listing images -->
				<?php endforeach; ?>

				</div><!-- end of logo-listing list -->
								
			<?php endforeach; ?> 				
					
			</div> <!-- end of logo-listing lists -->

	</div><!-- end of logo-listing container -->

</section><!-- end of logo-listing section --> 
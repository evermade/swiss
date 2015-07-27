<section class="logo-listing">

	<div class="logo-listing__container">

		<div class="logo-listing__row">

			<div class="logo-listing__item">

				<?php echo $block->sprint('<h1 class="logo-listing__title">%s</h1>', 'listing_title'); ?>

				<div class="logo-listing__text">
					<?php echo $block->get('listing_text', 'fields'); ?>
				</div>

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

								</div>
							<?php endforeach; ?>

							</div>
					<?php endforeach; ?>

					</div>
									
				<?php endforeach; ?> 				
						
				</div>

			</div>

		</div><!-- end of row -->

	</div><!-- end of wrapper -->

</section><!-- end of section --> 
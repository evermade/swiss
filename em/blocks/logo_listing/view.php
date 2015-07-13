<section class="logo-listing">

	<div class="logo-listing__container">

		<div class="logo-listing__row">

			<div class="logo-listing__item">

				<h1 class="logo-listing__title"><?php echo $block->get('listing_title', 'fields'); ?></h1>

				<div class="logo-listing__text">
					<?php echo $block->get('listing_text', 'fields'); ?>
				</div>

				<div class="logo-listing__lists">

				<?php foreach ($block->repeaters['listing_list'] as $key => $list): ?>

					<div class="logo-listing__list">

					<?php foreach(array_chunk($list['list_images'], $block->data['per_row']) as $set): ?>
						<h2 class="logo-listing__list__title"><?php echo $list['list_title']; ?></h2>

							<div class="logo-listing__list__images">
							
							<?php foreach($set as $item): ?>
								<div class="logo-listing__list__image" data-vp-add-class="animated fadeInUp">

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
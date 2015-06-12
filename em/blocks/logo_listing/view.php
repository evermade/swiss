<section class="logo-listing<?php echo $block->getCss('section');?>">
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12">

			<h1 class="logo-listing__title"><?php echo $block->get('listing_title', 'fields'); ?></h1>

			<div class="logo-listing__text">
				<?php echo $block->get('listing_text', 'fields'); ?>
			</div>

			<div class="logo-listing__lists">
				
				<?php foreach ($block->repeaters['listing_list'] as $key => $list): ?>
					
				<div class="logo-list">
					<h2 class="logo-list__title">a list heading</h2>

					<?php foreach(array_chunk($list['list_images'], $block->data['per_row']) as $set): ?>
						<div class="logo-list__images">
						
						<?php foreach($set as $item): ?>
							<div class="logo-list__image">

							<div class="logo-list__image__inner" style="background-image: url(<?php echo $item['sizes']['logo-listing']; ?>);">
							</div>

							</div>
						<?php endforeach; ?>

						</div>
					<?php endforeach; ?>

				</div>

				<?php endforeach; ?>

			</div><!-- end of logo lists -->

			</div>

		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
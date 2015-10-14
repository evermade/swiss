<section class="media-object-listing<?php echo $block->getCss('section');?>" data-count="<?php echo sizeof($block->repeaters['media_object_items']); ?>">
	
	<div class="media-object-listing__container">

	<header class="section-header section-header--centered">
        <?php echo Helper::sprint('<h1 class="section-header__title">%s</h1>', $block->fields['media_object_title']); ?>
    </header>

	<?php if(!empty($block->repeaters['media_object_items'])): 

		foreach(array_chunk($block->repeaters['media_object_items'], $block->data['per_row']) as $set): ?>

		<div class="media-object-listing__row" data-per-row="<?php echo $block->data['per_row']; ?>">

		<?php foreach($set as $p):?>

				<div class="media-object-listing__item">

					<div class="media-object-listing__item__inner">
					
						<div class="media-object-listing__item__image">
						<?php if(is_array($p['media_object_item_image'])):   ?>
							<img src="<?php echo $p['media_object_item_image']['sizes']['medium-large']; ?>" alt="<?php echo $p['media_object_item_title']; ?>" class=""/>
						<?php endif; ?> 
				    	</div><!-- end of media-object-listing item image-->
						
						<div class="media-object-listing__item__content">
			    			<h2 class="media-object-listing__item__title"><?php echo $p['media_object_item_title']; ?></h2>
							<?php echo Helper::sprint('<p class="media-object-listing__item__role">%s</p>', $p['media_object_item_role']); ?>
							<?php echo Helper::sprint('<div class="media-object-listing__item__text">%s</div>', $p['media_object_item_text']); ?>
							<?php echo Helper::sprint('<a href="mailto:%s" class="media-object-listing__item__email">%s</a>', [$p['media_object_item_email'], $p['media_object_item_email']]); ?>
						</div><!-- end of media-object-listing content -->

					</div><!-- end of media-object-listing item inner -->

		    	</div> <!-- end of media-object-listing item -->

		<?php endforeach; ?>

		</div><!-- end of media-object-listing row -->

		<?php endforeach; wp_reset_postdata(); ?>

	<?php else: ?>
		
		<div class="row">
			<div class="col-xs-12 text-center">
				<p>No contact categories found.</p>
			</div>
		</div>

	<?php endif; ?>

    </div><!-- end of media-object-listing container -->
    
</section><!-- end of media-object-listing section -->
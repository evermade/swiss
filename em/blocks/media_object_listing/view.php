<section class="media-object-listing<?php echo $block->getCss('section');?>">
	
	<div class="media-object-listing__container">

	<?php if(!empty($block->repeaters['media_object_items'])): 

		foreach(array_chunk($block->repeaters['media_object_items'], $block->data['per_row']) as $set): ?>

		<div class="media-object-listing__row">

		<?php foreach($set as $p):?>

				<div class="media-object-listing__item">
					
					<div class="media-object-listing__item__image">
					<?php if(is_array($p['media_object_item_image'])):   ?>
						<img src="<?php echo $p['media_object_item_image']['sizes']['medium-large']; ?>" alt="<?php echo $p['media_object_item_title']; ?>" class=""/>
					<?php endif; ?> 
			    	</div>
					
					<div class="media-object-listing__item__content">
		    			<h2 class="media-object-listing__item__title"><?php echo $p['media_object_item_title']; ?></h2>

						<div><?php echo $p['media_object_item_text']; ?></div>

						<?php echo Helper::sprint('<p class="media-object-listing__item__role">%s</p>', [$p['media_object_item_role']]); ?>

						<a href="mailto:<?php echo $p['media_object_item_email']; ?>" class="media-object-listing__item__email"><?php echo $p['media_object_item_email']; ?></a>

					</div>
		    	</div> <!-- end of media-object-listing block -->

		<?php endforeach; ?>

		</div><!-- end of row -->

		<?php endforeach; wp_reset_postdata(); ?>

	<?php else: ?>

		<p>No contact categories found.</p>

	<?php endif; ?>

    </div><!-- end of media-object-listing container -->
    
</section><!-- end of media-object-listing section -->
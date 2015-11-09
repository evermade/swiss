<!--
Description: A simple gallery using the grid layout, and a gallery item component within.
Tags: gallery, grid
Preview: true
-->

<section>

	<div class="grid grid--no-gutter">
		<div class="grid__container">

			<div class="grid__row" data-count="4">
				
				<?php for($i=0; $i<8; $i++): ?>
					
				<div class="grid__item">

					<?php include(get_template_directory().'/templates/toolbox/components/gallery-item.php'); ?> 

				</div><!-- end of grid item -->

				<?php endfor; ?> 
				
			</div><!-- end of grid row -->
		
		</div><!-- end of grid container -->
	</div>

</section>
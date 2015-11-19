<!--
Description: A simple listing using the grid layout, and a list item component within.
Tags: listing, grid, block
Preview: true
-->

<section>

	<div class="grid grid--no-gutter">
		<div class="grid__container">

			<div class="grid__row" data-count="2">

				<?php for($i=0; $i<8; $i++): ?>

				<div class="grid__item">

					<?php include(get_template_directory().'/templates/toolbox/components/list-item.php'); ?>

				</div><!-- end of grid item -->

				<?php endfor; ?>

			</div><!-- end of grid row -->

		</div><!-- end of grid container -->
	</div>

</section>
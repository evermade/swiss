<!--
Description: A full width grid example where based upon the date-count attribute the CSS will handle the columsn widths and responsive task.
Tags: grid, full width
Preview: true
-->

<section class="grid grid--full grid--fixed">
	<div class="grid__container">

		<div class="grid__row" data-count="4">

			<?php for($j=0; $j<4; $j++): ?>
			<div class="grid__item">
				<p>Fixed</p>
			</div><!-- end of grid item -->
			<?php endfor; ?> 

		</div><!-- end of grid row -->
	
	</div><!-- end of grid container -->
</section><!-- end of grid --> 
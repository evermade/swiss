<!--
Description: A full width grid example where based upon the date-count attribute the CSS will handle the columsn widths and responsive task.
Tags: grid, full width
Preview: true
-->

<div class="grid grid--no-gutter">
	<?php for($i=2; $i<5; $i++): ?>
		
	<div class="grid__row" data-count="<?php echo $i;?>">

		<?php for($j=0; $j<$i; $j++): ?>
		<div class="grid__item">

			<div class="component">
				<img class="component__image" src="http://fakeimg.pl/850x550/eeeeee/666/?text=img" alt="fake img"/>
			</div><!-- an example of component within a layout, this should be reusable and be saved in /assets/css/scss/components -->

		</div><!-- end of grid item -->
		<?php endfor; ?> 

	</div><!-- end of grid row -->

	<?php endfor; ?> 

</div><!-- end of grid --> 
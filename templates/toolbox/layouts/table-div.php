<!--
Description: A table div layout. By mobile divs are block level, and from tablets upwards they transform to table cells
Tags: columns, layout, tables
Preview: true
-->

<div class="table-div">

	<div class="table-div__row">

	<?php for($i=0; $i<3; $i++): ?>
		
		<div class="table-div__col">

			<img src="http://fakeimg.pl/150x150/eeeeee/666/?text=img" alt="fake img"/>

			<h2>Table Cell</h2>

			<p>Table cell layout on tablet/desktop, block level on mobile. This way we can utilise vertical alignment and equal heights with ease.</p>

		</div><!-- end of table div col -->

	<?php endfor; ?> 

	</div><!-- end of table div row -->

</div><!-- end of table div -->
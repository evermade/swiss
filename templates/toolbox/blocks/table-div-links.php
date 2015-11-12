<!--
Description: A table div layout. By mobile divs are block level, and from tablets upwards they transform to table cells
Tags: columns, layout, tables
Preview: true
-->

<div class="table-div">

	<div class="table-div__row" data-count="3">

	<?php for($i=0; $i<3; $i++): ?>

		<div class="table-div__col table-div__col--span1">
			<div class="hero">

				<div class="hero__background" style=" background-image:url(http://fakeimg.pl/650x650/eee/666/?text=bg);"></div>

				<div class="hero__overlay"></div>

				<div class="hero__content">
					<h2>Default</h2>
					<p>By default the hero has a fixed min-height. The content is centered horizontally and vertically.</p>
					<a href="1" class="btn">Read More</a>
				</div>

			</div><!-- end of hero -->
		</div><!-- end of table div col -->

	<?php endfor; ?>

	</div><!-- end of table div row -->

</div><!-- end of table div links -->
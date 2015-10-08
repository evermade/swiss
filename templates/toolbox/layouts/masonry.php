<!--
Description: A basic masonry layout example. Child elements should be resuable components and not attached to this. Its purpose is layout.
Tags: layout, masonry
Preview: true
-->

<section class="masonry">
	<div class="masonry__container">

		<header class="section-header">
	        <h1 class="section-header__title">Masonry Block template</h1>
	    </header>

		<div class="masonry__items">

			<?php for($i=0; $i<20; $i++): ?>
				
			<div class="masonry__item">

				<div class="masonry__item__inner" data-vp-add-class="animated fadeInUp">
					<img src="http://fakeimg.pl/650x<?php echo rand(100, 600);?>/eeeeee/666/?text=img" alt="fake img"/>
				</div>
			</div><!-- end of masonry item -->

			<?php endfor; ?> 

		</div><!-- end of masonry row -->

	</div><!-- end of masonry container -->
</section><!-- end of masonry section--> 
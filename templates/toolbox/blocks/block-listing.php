<!--
Description: A basic block listing example. 
Tags: block listing, block
Preview: true
-->

<section class="block-listing">
	<div class="block-listing__container">

		<header class="section-header section-header--block-listing">
			<h1 class="section-header__title">A block listing</h1>
		</header>

		<div class="block-listing__row" data-count="3">
			
			<?php for($i=0; $i<3; $i++): ?>
				
			<div class="block-listing__item">
				<img src="http://emtheme.highway/wp-site/wp-content/uploads/2015/05/fakeimg-4-651x296.png" alt="fakeimg-4-651x296.png" class="block-listing__item__image">
				<h2 class="block-listing__item__title">This is an item title</h2>
				<div class="block-listing__item__content">
					<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>.</p>
					<p><a href="#" class="btn">This is a button</a></p>
				</div>
			</div><!-- end of block-listing item -->

			<?php endfor; ?> 

		</div>
		
	</div><!-- end of block-listing row -->
	
</section><!-- end of block-listing container -->
<section class="masonry<?php echo $block->getCss('section');?>">
	<div class="masonry__container">

		<header class="section-header">
	        <h1 class="section-header__title">Masonry Block template</h1>
	    </header>

		<div class="masonry__items">

			<?php for($i=0; $i<10; $i++): ?>
				
			<div class="masonry__item">

				<div class="masonry__item__inner" <?php Helper::animate('', ['el-up']); ?>>
					<div class="masonry__item__image">
						<img src="http://fakeimg.pl/650x<?php echo rand(150, 500);?>/666666/fff/?text=img" alt="fake img"/>
					</div>
					<div class="masonry__item__text">
						<?php echo Helper::lorem(rand(1, 2)); ?>

						<div class="masonry__item__meta">
							<p><a href="http://twitter.com/onefastsnail">@onefastsnail</a></p>
							<p>2 minutes ago</p>
						</div>
					</div>
				</div>
			</div><!-- end of masonry item -->

			<?php endfor; ?> 

		</div><!-- end of masonry row -->

	</div><!-- end of masonry container -->
</section><!-- end of masonry section--> 
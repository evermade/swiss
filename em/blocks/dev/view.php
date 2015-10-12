<section class="section<?php echo $block->getCss('section');?>">
	<div class="container">

	<header class="section-header">
	    <h1 class="section-header__title">Dev Playground</h1>
	</header>

		<div class="row">

		<div class="col-xs-12">

			<p>This is where developers can come and play with thier toys.</p>

			<form action="my_posts" method="get" class="form form-ajax" data-target="ajax-posts">
				<ul class="errors"></ul>
				<fieldset>
					<div class="form__group hidden">
						<label>Search Posts</label>
						<input id="search" type="text" name="search" class="text check " value="" placeholder="Your search...">
					</div>
					<div class="form__group">
						<input type="hidden" name="search" value="">
						<input type="hidden" name="per_page" value="2">
						<input type="hidden" name="offset" value="1">
						<button type="submit" class="btn"><i class="fa fa-spinner"></i> Get Posts</button>
					</div>
				</fieldset>
			</form>
			
			<div class="ajax-posts"></div>

			</div>

		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 

<?php include(get_template_directory().'/em/blocks/example_block/view.php'); ?>
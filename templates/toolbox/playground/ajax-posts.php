<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>A Simple AJAX call for posts</h2>
				<form action="my_posts" method="post" class="ajax-posts">

					<input type="hidden" name="paged" value="1">
					<input type="hidden" name="per_page" value="4">

					<ul class="ajax-posts__errors"></ul>
					<div class="ajax-posts__results"></div>
					
					<div class="text-center">
						<a href="#" class="btn ajax-posts__show-more"><i class="fa fa-spinner"></i> Show More</a>
					</div>
				</form>
			</div>
		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 
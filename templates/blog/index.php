<?php global $wp_query; ?>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-push-8 wysiwyg-html">
				
				<?php include(get_template_directory().'/templates/blog/_search.php'); ?>

				<?php include(get_template_directory().'/templates/blog/_categories.php'); ?>

				<?php include(get_template_directory().'/templates/blog/_archive.php'); ?>

				<?php include(get_template_directory().'/templates/blog/_tags.php'); ?>
				
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-pull-4">

				 <?php include(get_template_directory().'/templates/blog/_header.php'); ?>

				<?php
					if ( have_posts() ) : 

						while ( have_posts() ) : the_post();

							$my_post = new \Swiss\Post($post);

							include(get_template_directory().'/templates/blog/post-small.php');

						endwhile;

					endif;
				?>

			</div>
		</div><!-- end of row -->

		<div class="row">
			<div class="col-xs-12">
				<?php echo paginate_links(['type'=>'list', 'prev_next'=>false]); ?>
			</div>
		</div>

	</div><!-- end of container -->
</section><!-- end of section --> 
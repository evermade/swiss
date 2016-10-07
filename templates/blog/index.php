<?php global $wp_query; ?>

<section class="b-block">
	<div class="l-column-sidebar">
		<div class="l-column-sidebar__container">
			<div class="l-column-sidebar__content">
	
				<?php include(get_template_directory().'/templates/blog/_header.php'); ?>
	
				<?php
	
				if ( have_posts() ) : 
	
					while ( have_posts() ) : the_post();
	
						$my_post = new \Swiss\Post($post);
	
						include(get_template_directory().'/templates/blog/c-post-large.php');
	
					endwhile;
	
				endif;
	
				?>
	
				<?php echo paginate_links(['type'=>'list', 'prev_next'=>false]); ?>	
	
			</div>
			<div class="l-column-sidebar__sidebar">
				<div class="c-sidebar">
					<div class="c-sidebar__module">
						<?php include(get_template_directory().'/templates/blog/_search.php'); ?>
					</div>
					<div class="c-sidebar__module">
						<?php include(get_template_directory().'/templates/blog/_categories.php'); ?>
					</div>
					<div class="c-sidebar__module">
						<?php include(get_template_directory().'/templates/blog/_archive.php'); ?>
					</div>
					<div class="c-sidebar__module">
						<?php include(get_template_directory().'/templates/blog/_tags.php'); ?>
					</div>
	
				</div>
				
			</div>
		</div>
	</div><!-- end of container -->
</section><!-- end of section --> 
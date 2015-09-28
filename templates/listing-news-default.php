<?php

$paged = get_query_var('paged');
$standard_posts = $wp_query->posts;
?>
<?php foreach($standard_posts as $post): setup_postdata($post); ?>
	<div class="post-hero cup animated bounceIn">
		<div class="container">
			<div class="listing-item-vertical listing-item-vertical--bottom coffee">
				<div class="content">
					<p class="accent"><?php echo get_the_date(); ?></p>
					<h2 class="headline headline--xxl"><?php the_title(); ?></h2>
					<p>This is a short paragraph which can be added anywhere. This is a short paragraph which can be added anywhere. This is a short paragraph which can be added anywhere.</p>
					<a href="<?php the_permalink(); ?>" class="btn">Button</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; wp_reset_postdata(); ?>
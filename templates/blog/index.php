<?php

$paged = get_query_var('paged');
$standard_posts = $wp_query->posts;

if(!empty($standard_posts)):

	foreach($standard_posts as $post): setup_postdata($post); 
		$my_post = new \Swiss\Post($post);
		include(get_template_directory().'/templates/blog/post-small.php');
	endforeach; wp_reset_postdata();

endif;

echo paginate_links(['type'=>'list', 'prev_next'=>false]); ?>
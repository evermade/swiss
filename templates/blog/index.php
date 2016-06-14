<?php

$paged = get_query_var('paged');
$standard_posts = $wp_query->posts;
?>
<?php
foreach($standard_posts as $post): setup_postdata($post); 
	include(get_template_directory().'/templates/blog/post-small.php');
endforeach; wp_reset_postdata(); ?>

<?php echo paginate_links(['type'=>'list', 'prev_next'=>false]); ?>
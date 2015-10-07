<?php 

$prev_link = get_previous_posts_link('Newer Articles');
$next_link = get_next_posts_link('Older Articles');

if($prev_link || $next_link):
?>

<div class="blog__pagination">
	<div class="blog__pagination__column">
		<div class="blog__previous_posts_link"><?php echo $prev_link; ?></div>
		<div class="blog__next_posts_link"><?php echo $next_link; ?></div>
	</div>
</div>

<?php endif;
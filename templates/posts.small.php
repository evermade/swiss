<h2>Posts</h2>
<ul class="list list--vertical list--posts">
<?php
foreach(array_chunk($custom_posts->posts, 99) as $set ):
	foreach($set as $post): setup_postdata($post) ?>
		
	<li><a href="<?php the_permalink(); ?>" class="btn"><?php the_title(); ?></a></li>	

<?php endforeach;
endforeach; wp_reset_postdata(); ?>
</ul>

<p><a href="/blog/" class="btn ">Show All</a></p>
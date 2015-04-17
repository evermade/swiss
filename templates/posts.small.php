<h2>Posts</h2>
<ul class="list list--vertical list--icons list--posts">
<?php
foreach(array_chunk($custom_posts->posts, 99) as $set ):
	foreach($set as $post): setup_postdata($post) ?>
		
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>	

<?php wp_reset_postdata(); endforeach;
endforeach; ?>
</ul>

<p><a href="/blog/" class="btn ">Show All</a></p>
<?php
//setup post arguments
$args = array(
	'post_type' => 'post',
	'posts_per_page' => -1,
);

//how many per row when we chunk the output array, like 4 per row for example
$per_row = 100;

//run the query
$custom_query = new WP_Query($args);

//lets check if our query returned results
if($custom_query->have_posts()) : ?>

	<?php 
		//bring the post var into this scope
        global $post; 
        
        //lets chunk our results into rows if needed
        foreach(array_chunk($custom_query->posts, $per_row) as $set): 
    ?>

		<?php
            //lets loop and setup the post data per post object from our query to utilise the WP template tags
			foreach($set as $post): setup_postdata($post); 
                
                //an example of getting the acf fields from this post
				$my_post = new \Swiss\Post($post);

				//include your template, dont use html here directly
		?>

				<h1><?php the_title();?></h1>

		<?php endforeach; ?>

	<?php endforeach; wp_reset_postdata(); //this is important to restore the post object back to current post for other things ?>

<?php endif;
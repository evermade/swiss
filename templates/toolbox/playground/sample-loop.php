<?php
// setup post arguments
$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => -1
);

// run the query
$custom_query = new WP_Query($args);

// lets check if our query returned results
if ($custom_query->have_posts()):

    // bring the post var into this scope
    global $post;

    // lets loop and setup the post data per post object from our query to utilise the WP template tags
    foreach ($custom_query->posts as $post): setup_postdata($post);

        // an example of getting the acf fields from this post
        $my_post = new \Swiss\Post($post);

        // include your template, dont use html here directly
        include(get_template_directory().'/templates/blog/post-small.php');

    endforeach; wp_reset_postdata(); // this is important to restore the post object back to current post for other things

endif;

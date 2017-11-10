<?php
/*

SINGLE VIEW RELOCATED
----
single.php has been moved under /templates/post-type/single.php for consistency's sake.

This file only checks what the post type is and then pulls the correct template.

 */

// check our current post type
$type = (empty(get_post_type()) || get_post_type() == 'post')? 'blog' : get_post_type();

// our post index path within templates
$path = get_template_directory().'/templates/'.$type.'/single.php';

// if we have a post type index file, use it, else default to blog
if(file_exists($path)) {
    include($path);
}
else {
    include(get_template_directory().'/templates/blog/single.php');
}
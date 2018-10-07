<?php namespace Evermade\Swiss\Blog;

/**
 * a simple function to help dry out views of checking array indexes and object properties
 * @param  [type] $key   [description]
 * @param  array  $array [description]
 * @return [type]        [description]
 */
function getPostsReadMore(int $postAmount, $postExcluded = "") : array
{
    $args = array(
        'posts_per_page'  => $postAmount,
        'exclude'         => $postExcluded
    );

    return get_posts($args);
}

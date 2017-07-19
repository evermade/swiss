<h3 class="h4">Archive</h3>
<?php
$args = array(
    'show_post_count'   => true,
    'format'            => 'custom',
    'before'            => '<div class="">',
    'after'             => '</div>',
    'echo'              => false
);

if(!empty(get_post_type())) {
    $args['post_type'] = get_post_type();
}

$archives = wp_get_archives($args);

echo $archives;
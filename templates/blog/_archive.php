<h3>Archive</h3>
<?php
	$args = array(
		'show_post_count' => true,
		'format' => 'custom',
		'before' => '<div class="">',
		'after' => '</div>',
		'echo' => false,
		'post_type' => get_post_type()
	);

	$archives = wp_get_archives($args);

	echo $archives;
?>
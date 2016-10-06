<?php get_header();

//a simple switch so we can offer different index pages per post type, including custom post types, all defaulting the the blog
switch (get_post_type()) {

	// case 'object':
	// 	include(get_template_directory().'/templates/object/index.php');
	// 	break;

	default:
		include(get_template_directory().'/templates/blog/index.php');
		break;
}

get_footer();
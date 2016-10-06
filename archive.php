<?php get_header();

switch (get_post_type()) {

	case 'object':
		include(get_template_directory().'/templates/blog/index.php');
		break;

	default:
		include(get_template_directory().'/templates/blog/index.php');
		break;
}

get_footer();
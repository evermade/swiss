<?php get_header();

if(isset($_GET['toolbox'])){
	/* ------- FIRST GLANCE TEMPLATE -------- */
	include(locate_template('page-elements.php'));
}
else {
	/* ------- REAL INDEX -------- */
	include(locate_template('archive.php'));
}

get_footer();
?>

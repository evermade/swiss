<?php
/*
Template Name: Elements
*/

if (isset($_GET['element-viewer'])) {

	include(locate_template('page-elements-viewer.php'));

} else if (isset($_GET['element-list'])) {

	include(locate_template('page-elements-listing.php'));

} else {

	include(locate_template('archive.php'));

}

?>

<?php
//custom config
require_once(get_template_directory().'/em/config.php');

//classes, maybe use psr auto loading?
require_once(get_template_directory().'/em/classes/class.app.php');
require_once(get_template_directory().'/em/classes/class.em.php');
require_once(get_template_directory().'/em/classes/class.block.php');
require_once(get_template_directory().'/em/classes/class.animate.php');

//hooks
require_once(get_template_directory().'/em/hooks.php');

//custom post types
require_once(get_template_directory().'/em/post.types.php');

//custom shortcodes
require_once(get_template_directory().'/em/shortcodes.php');

//intended for enqueue scripts
require_once(get_template_directory().'/em/assets.php');

//navigation
require_once(get_template_directory().'/em/navigation.php');

//image sizes
require_once(get_template_directory().'/em/image-sizes.php');

//lets loop and include the block init files
foreach(glob(get_template_directory().'/em/blocks/*/init.php') as $block_config){
	include_once($block_config);	
}

$app = null;
function em_startup(){
	global $app;
	//lets initialise our app
	$app = new app;
}

add_action( 'init', 'em_startup' );
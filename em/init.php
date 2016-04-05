<?php
//custom config
require_once(get_template_directory().'/em/config.php');

//classes, maybe use psr auto loading?
require_once(get_template_directory().'/em/classes/class.app.php');
require_once(get_template_directory().'/em/classes/class.helper.php');
require_once(get_template_directory().'/em/classes/class.em.php');
require_once(get_template_directory().'/em/classes/class.block.php');
require_once(get_template_directory().'/em/classes/Theme.php');
require_once(get_template_directory().'/em/classes/User.php');
require_once(get_template_directory().'/em/classes/WP_Post.php');

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

//rest-api
require_once(get_template_directory().'/em/rest-api.php');

//ajax
require_once(get_template_directory().'/em/ajax.php');

//lets setup our theme upon activating it
add_action('after_switch_theme', 'mytheme_setup_options');

function mytheme_setup_options () {
  Helper::activate_plugin('advanced-custom-fields-pro/acf.php');
  Helper::activate_plugin('rest-api/plugin.php');
}

//lets loop and include the block init files
foreach(glob(get_template_directory().'/em/blocks/*/init.php') as $block_config){
	include_once($block_config);	
}

//lets initialise our global app
global $app;
$app = new app;
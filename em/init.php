<?php
//custom config
require_once(get_template_directory().'/em/config.php');

//classes, maybe use psr?
require_once(get_template_directory().'/em/classes/class.app.php');
require_once(get_template_directory().'/em/classes/class.em.php');
require_once(get_template_directory().'/em/classes/class.block.php');

//hooks
require_once(get_template_directory().'/em/hooks.php');

//custom post types
require_once(get_template_directory().'/em/post.types.php');

//custom shortcodes
require_once(get_template_directory().'/em/shortcodes.php');

//intended for enqueue scripts
require_once(get_template_directory().'/em/assets.php');

//lets initialise our app
$app = new app;
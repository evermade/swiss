<?php
namespace Swiss;

// custom config
require_once( get_template_directory().'/lib/config.php' );

// functions
require_once( get_template_directory().'/lib/functions/acf.php' );
require_once( get_template_directory().'/lib/functions/blog.php' );
require_once( get_template_directory().'/lib/functions/index.php' );

// classes, maybe use psr auto loading?
require_once( get_template_directory().'/lib/classes/App.php' );
require_once( get_template_directory().'/lib/classes/Block.php' );
require_once( get_template_directory().'/lib/classes/User.php' );
require_once( get_template_directory().'/lib/classes/Post.php' );

// hooks
require_once( get_template_directory().'/lib/hooks.php' );

// custom post types
require_once( get_template_directory().'/lib/post.types.php' );

// custom shortcodes
require_once( get_template_directory().'/lib/shortcodes.php' );

// intended for enqueue scripts
require_once( get_template_directory().'/lib/assets.php' );

// image sizes
require_once( get_template_directory().'/lib/image-sizes.php' );

// rest-api
require_once( get_template_directory().'/lib/rest-api.php' );

// lets loop and include the block init files
// foreach(glob(get_template_directory().'/lib/blocks/*/init.php') as $block_config){
//     include_once($block_config);
// }

$app = null;

// Fires after WordPress has finished loading but before any headers are sent
add_action( 'init', function() {

    global $app;

    // lets initialise our global app
    $app = new \Swiss\App;
});

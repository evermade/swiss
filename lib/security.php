<?php

namespace Evermade\Swiss\Security;

function removeScriptVersion($src)
{
    return $src ? esc_url(remove_query_arg('ver', $src)) : false;
}

// remove stupid wp and plugin tags for security
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'meta_generator_tag');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

// remove version numbers from asset links
add_filter('script_loader_src', '\Evermade\Swiss\Security\removeScriptVersion', 15, 1);
add_filter('style_loader_src', '\Evermade\Swiss\Security\removeScriptVersion', 15, 1);

// lets disable the user endpoint
add_filter('rest_endpoints', function ($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

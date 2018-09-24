<?php
namespace Evermade\Swiss\Assets;

function publicScriptsAndStyles()
{

    // de-register jquery, since we are manually adding it
    wp_deregister_script('jquery');

    // let's get a specific version of jquery
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', array(), null, false);

    // scripts
    wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js');

    wp_enqueue_script('swiss', get_template_directory_uri().'/assets/dist/main.'.filemtime(get_stylesheet_directory() . '/assets/dist/main.js').'.js', array(), null, true);

    // fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,100italic,100,300italic,500,500italic,700,700italic,900,900italic');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css');

    // styles
    wp_enqueue_style('swiss', get_template_directory_uri().'/assets/dist/main.'.filemtime(get_stylesheet_directory() . '/assets/dist/main.css').'.css');
}

add_action('wp_enqueue_scripts', 'Evermade\Swiss\Assets\publicScriptsAndStyles');

function admin_scripts_and_styles()
{
    wp_enqueue_script('swiss-acf', get_template_directory_uri().'/assets/admin/js/acf.'.filemtime(get_stylesheet_directory() . '/assets/admin/js/acf.js').'.js', array(), null, true);
}

add_action('admin_enqueue_scripts', 'Evermade\Swiss\Assets\admin_scripts_and_styles');

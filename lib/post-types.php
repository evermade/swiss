<?php
namespace Evermade\Swiss\PostTypes;

/*
 * -----------------------------------------------------
 * EXAMPLE POST TYPE
 * -----------------------------------------------------
 */

function exampleSetup()
{
    $labels = array(
        'name'                  => _x('Examples', 'post type general name', 'swiss'),
        'singular_name'         => _x('Example', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Example', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Example', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Example', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Example', 'add new post text', 'swiss'),
        'all_items'             => _x('All Examples', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Example', 'view post text', 'swiss'),
        'search_items'          => _x('Search Examples', 'search post text', 'swiss'),
        'not_found'             => _x('No Examples found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Examples found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('All Examples', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('This is an example description', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'has_archive'           => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'menu_icon'             => 'dashicons-book',
        'rewrite'               => array(
            'slug' => _x('example', 'URL slug', 'swiss')
        )
    );

    register_post_type('example', $args);
}

/*
 * -----------------------------------------------------
 * ENABLE/DISABLE CUSTOM POST TYPES
 * -----------------------------------------------------
 */

function setCustomTypes()
{
    // exampleSetup();
}

add_action('init', 'Evermade\Swiss\PostTypes\setCustomTypes');

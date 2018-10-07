<?php namespace Evermade\Swiss\Acf;

/**
 * get the post blocks by a specific type, by default we get the page type of blocks
 * this way it allows different block groups to be created and not pollute the main page block space
 * for example we could have the following post types each with thier own block group (page, story etc)
 * @param  string $name [description]
 * @return [type]       [description]
 */
function postBlocks(string $name='page', string $version='v1') : bool
{

    //lets check is ACF available
    if (!\Evermade\Swiss\Acf\isAcfActive() || empty($name)) {
        return false;
    }

    //loop the blocks fields
    while (has_sub_field('swiss_'.$name.'_blocks_'.$version)) {
        $template = get_template_directory().'/lib/blocks/'.$name.'/'.str_replace(' ', '-', strtolower(get_row_layout())).'/render.php';
        if (!file_exists($template)) {
            \Evermade\Swiss\debug($template ." - Template not found");
            continue;
        }

        include($template);
    }

    return true;
}

/**
 * to fetch and return a url from a ACF image array
 *
 * @param string $size
 * @param [type] $key
 * @return string|null
 */
function getImageUrl(string $size='original', $data=null) : ?string
{

    // bail out if we dont have what we need
    if (empty($data) || empty($size)) {
        return null;
    }

    // allows us to pass an array or a key to fetch from current post
    $image = (is_string($data))? \get_field($data) : $data;

    // do we have our image
    if (!empty($image) && is_array($image)) {

        // special case for originals as they are outside the sizes array
        if ($size == 'original' && isset($image['url'])) {
            return $image['url'];
        } elseif (isset($image['sizes'][$size])) {
            return $image['sizes'][$size];
        }
    }

    return null;
}

/**
 * to return an image tag from a ACF image array
 *
 * @param string $size
 * @param [type] $key
 * @param string $class
 * @return string|null
 */
function getImage(string $size='medium-large', $key=null, string $class='') : ?string
{
    $imageUrl = \Evermade\Swiss\Acf\getImageUrl($size, $key);

    if ($imageUrl) {
        return sprintf('<img src="%s" alt="image" class="%s">', $imageUrl, $class);
    }

    return null;
}

function getOption($group_fields)
{
    if (empty($group_fields) || !is_array($group_fields) || !\Evermade\Swiss\Acf\isAcfActive()) {
        return false;
    }

    $group_data = array();

    foreach ($group_fields as $field) {
        $group_data[$field] = \get_field($field, 'option');
    }

    return $group_data;
}

function isAcfActive() : bool
{
    return (function_exists('has_sub_field'))? true : false;
}

/**
 * Register our local block field groups via PHP to help distribute and share blocks amognst projects
 *
 * @return bool
 */
function registerLocalBlockFieldGroups() : bool
{

    // if we have ACF enabled
    if (function_exists('acf_add_local_field_group')) {

        // lets loop and include the block init files to do their thing
        foreach (glob(get_template_directory().'/lib/blocks/page/*/init.php') as $blockInit) {
            include_once($blockInit);
        }

        $layouts = \apply_filters('swiss_block_layouts', []);

        if (empty($layouts)) {
            return false;
        }

        /**
         * Register our fields y'all
         * https://www.advancedcustomfields.com/resources/register-fields-via-php/
         */
        acf_add_local_field_group(array(
            'key' => 'group_swiss_page_blocks_v1',
            'title' => 'Blocks',
            'fields' => array(
                array(
                    'key' => 'field_swiss_page_blocks_v1',
                    'label' => 'Blocks',
                    'name' => 'swiss_page_blocks_v1',
                    'type' => 'flexible_content',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'button_label' => 'Add Block',
                    'min' => '',
                    'max' => '',
                    'layouts' => $layouts,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
            'modified' => 1516178549,
        ));

        return true;
    }

    return false;
}

function defaultBlocks($value, int $post_id, $field)
{
    global $post;

    // if value is NULL then we have a new page and we want to add the default blocks
    if (!empty($value)) {
        return $value;
    }

    // get our defaults
    $defaults = get_field('post_block_defaults', 'option');

    // if we have some
    if (!empty($defaults)) {

        // loop our defaults
        foreach ($defaults as $a => $b) {

            // if our current post type editing page is this one lets go
            if ($b['post_type'] == $post->post_type) {

                // make value var array so we can push in
                $value = array();

                // loop the blocks in this post type
                foreach ($b['blocks'] as $c => $d) {

                    // finally push in
                    array_push($value, array('acf_fc_layout' => $d['block']));
                }
            }
        }
    }

    // and return
    return $value;
}

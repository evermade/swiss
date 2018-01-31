<?php
namespace Evermade\Swiss\Shortcodes;

function button($atts)
{

    extract(shortcode_atts(array(
        'class' => '',
        'text' => 'Submit',
        'url' => '#'
    ), $atts));

    return sprintf('<a href="%s" class="c-btn %s">%s</a>', $url, $class, $text);
}

add_shortcode('button', 'Evermade\Swiss\Shortcodes\button');

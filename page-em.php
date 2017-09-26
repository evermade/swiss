<?php
get_header();

if(!isset($_GET['t'])) {
    $_GET['t'] = 'index';
}

$folders = array('components', 'layouts', 'blocks');

?>
<!-- vendor/_em-toolbox.scss -->
<section class="b-toolbox">
    <div class="b-toolbox__container">
        <div class="b-toolbox__tabs">

            <ul>
                <li><a href="<?php echo add_query_arg('t', 'index'); ?>">Home</a></li>
                <li><a href="<?php echo add_query_arg('t', 'styleguide'); ?>">Styleguide</a></li>
                <li><a href="<?php echo add_query_arg('t', 'playground'); ?>">Playground</a></li>
            </ul>

        </div>
    </div><!-- end of b-toolbox__container -->
</section><!-- end of b-toolbox -->


<?php

switch ($_GET['t']) {
    case 'playground':
        include(get_template_directory().'/templates/toolbox/playground.php');
        break;
    case 'styleguide':
        include(get_template_directory().'/templates/toolbox/styleguide.php');
        break;
    default:
        include(get_template_directory().'/templates/toolbox/index.php');
        break;
};

?>

<?php get_footer();
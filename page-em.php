<?php
get_header();

if(!isset($_GET['t'])) {
    $_GET['t'] = 'index';
}

$folders = array('components', 'layouts', 'blocks');

?>
<section class="b-toolbox">
    <div class="b-toolbox__container">
        <div class="b-toolbox__sidebar">

            <div class="h-wysiwyg-html">

            <h3>Navigation</h3>
            <ul>
            <li><a href="<?php echo add_query_arg('t', 'index'); ?>">Home</a></li>
            <li><a href="<?php echo add_query_arg('t', 'styleguide'); ?>">Styleguide</a></li>
            <li><a href="<?php echo add_query_arg('t', 'components'); ?>">Components</a></li>
            <!-- <li><a href="<?php echo add_query_arg('t', 'animations'); ?>">Animations</a></li> -->
            <li><a href="<?php echo add_query_arg('t', 'playground'); ?>">Playground</a></li>
            <!-- <li><a href="<?php echo add_query_arg('t', 'demo'); ?>">Demo Page</a></li> -->
            </ul>

            <?php

            foreach($folders as $folder):
                $folders[$folder] = glob(get_template_directory().'/templates/toolbox/'.$folder.'/*.php');

            ?>

            <h3><?php echo $folder; ?></h3>
            <ul>
            <?php
            foreach($folders[$folder] as $c):
                echo '<li><a href="/em/#'.basename($c).'">'.basename($c, '.php').'</a></li>';
            endforeach; ?>
            </ul>
            <?php endforeach; ?>

            </div>

        </div>
        <div class="b-toolbox__content">

            <?php

            switch ($_GET['t']) {
                case 'animations':
                    //include(get_template_directory().'/templates/toolbox/animations.php');
                    break;
                case 'components':
                    include(get_template_directory().'/templates/toolbox/components.php');
                    break;
                case 'playground':
                    include(get_template_directory().'/templates/toolbox/playground.php');
                    break;
                case 'styleguide':
                    include(get_template_directory().'/templates/toolbox/styleguide.php');
                    break;
                case 'demo':
                    //include(get_template_directory().'/templates/toolbox/demo.php');
                    break;
                default:
                    include(get_template_directory().'/templates/toolbox/index.php');
                    break;
            };

            ?>

        </div><!-- end of b-toolbox__row -->
    </div><!-- end of b-toolbox__container -->
</section><!-- end of b-toolbox -->

<?php get_footer();
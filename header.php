<?php include(get_template_directory().'/templates/head.php'); ?>

<a href="#content" class="h-accessability js-skip-to-content"><?php _e('Skip to content', 'swiss'); ?></a>

<header class="b-header js-header">
    <div class="b-header__bar">
        <div class="b-header__container">

            <div class="l-navigation-bar">
                <div class="l-navigation-bar__logo">
                    <?php include(get_template_directory().'/templates/_site-logo.php'); ?>
                </div>
                <div class="l-navigation-bar__menu">
                    <nav>
                        <?php wp_nav_menu(array('container_class' => 'c-header-menu-desktop', 'menu_class' => 'c-header-menu-desktop__list', 'theme_location' => 'header-navigation', 'fallback_cb' => false)); ?>
                    </nav>
                </div>
                <div class="l-navigation-bar__tools">
                    <?php
                    /**
                     * If you don't need any other tools apart from the menu-toggle,
                     * you can either move it from tools to one level above or set
                     * the CSS display of tools to "none" on desktop resolutions.
                     */
                    ?>
                    <div class="l-navigation-bar__menu-toggle">
                        <?php include(get_template_directory().'/templates/_menu-toggle.php'); ?>
                    </div>
                    <div class="l-navigation-bar__social">
                        <?php echo \Evermade\Swiss\template('_social-media.php', $app->get('opt_social_media')); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="b-header__mobile-navigation">

        <div class="l-mobile-navigation">
            <div class="l-mobile-navigation__menu">
                <?php wp_nav_menu(array('container_class' => 'c-header-menu-mobile', 'menu_class' => 'c-header-menu-mobile__list', 'theme_location' => 'header-navigation', 'fallback_cb' => false)); ?>
            </div>
            <div class="l-mobile-navigation__tools">
                <div class="l-mobile-navigation__social">
                    <?php echo \Evermade\Swiss\template('_social-media.php', $app->get('opt_social_media')); ?>
                </div>
            </div>
        </div>

    </div>
</header>

<div id="content" class="b-page-content b-page-content--offset">

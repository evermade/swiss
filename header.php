<?php include(get_template_directory().'/templates/head.php'); ?>

<header class="b-page-navigation">

    <div class="b-page-navigation__container">

        <a class="b-page-navigation__logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

        <div class="c-mobile-toggle"><div></div><div></div><div></div></div>

        <?php wp_nav_menu(array('container_class' => 'b-page-navigation__list', 'menu_class' => 'c-page-navigation', 'theme_location' => 'header-navigation', 'fallback_cb' => false)); ?>

    </div>

</header>
<div class="b-page-content">

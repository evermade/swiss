<?php
    global $app;
?>
</div><!-- end of .page-content -->

<footer class="b-footer">

    <div class="b-footer__container">
        
        <div class="b-footer__logo">

            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-black.svg" alt="<?php bloginfo('name'); ?>">
            </a>

        </div>

        <div class="b-footer__social-media">

            <?php echo \Swiss\template('_social-media.php', $app->get('opt_social_media')); ?>

        </div>

        <div class="b-footer__navigation">

            <?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'c-page-navigation-footer', 'container' => '')); ?>
            
        </div>

    </div>

    <div class="b-footer__container">
        <div class="b-footer__copyright">

            <p>&copy; Copyright <?php echo date('Y');?>&nbsp;•&nbsp;<?php bloginfo('name'); ?>&nbsp;•&nbsp;All rights reserved.</p>
            <p>Website crafted by <a href="https://www.evermade.fi" target="_blank" rel="noopener noreferrer">Evermade</a>.</p>

        </div>
    </div>

</footer><!-- end of footer -->

<?php include(get_template_directory().'/templates/foot.php'); ?>
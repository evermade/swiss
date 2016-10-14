<?php include(get_template_directory().'/templates/head.php'); ?>
	
<header class="b-page-navigation b-page-navigation--relative">

	<div class="b-page-navigation__container">

		<a class="b-page-navigation__logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

		<div class="b-page-navigation__mobile-toggle js-b-page-navigation__mobile-toggle"><div></div><div></div><div></div></div>

		<div class="b-page-navigation__pages-wrapper">
			<?php wp_nav_menu(array('menu_class' => 'b-page-navigation__pages', 'theme_location' => 'header-navigation')); ?>

			<div class="b-page-navigation__pages-wrapper__mobile">
				<!-- Add mobile extra elements here here -->
			</div>
		</div>
	
	</div>

</header><!--end of header -->
<div class="page-content">
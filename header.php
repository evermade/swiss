<?php include(get_template_directory().'/templates/head.php'); ?>
	
<header class="page-navigation page-navigation--relative">

	<div class="page-navigation__container">

		<a class="page-navigation__logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

		<div class="page-navigation__mobile-toggle js-page-navigation__mobile-toggle"><div></div><div></div><div></div></div>

		<div class="page-navigation__pages-wrapper">
			<?php wp_nav_menu(array('menu_class' => 'page-navigation__pages', 'theme_location' => 'header-navigation')); ?>

			<div class="page-navigation__pages-wrapper__mobile">
				<!-- Add mobile extra elements here here -->
			</div>
		</div>
	
	</div>

</header><!--end of header -->
<div class="page-content">
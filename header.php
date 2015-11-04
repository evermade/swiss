<?php include(get_template_directory().'/templates/head.php'); ?>
	
	<header class="main-header">
		
			<div class="nav-bar nav-bar--header">
	
				<div class="container">
	
					<div class="row">
	
						<div class="col-xs-12">
	
							<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="nav-bar__logo"><?php bloginfo('name'); ?></a>
	
							<div class="navtoggle"><div class="div"></div><div class="div"></div><div class="div"></div></div>
						
							<nav class="nav" role="navigation">
				              <?php wp_nav_menu(array('theme_location' => 'header-navigation', 'menu_class' => 'nav__list nav__list--bar')); ?>
				          	</nav>
	
			          	</div>
	
		          	</div>
	
				</div><!-- end of wrapper -->
	
			</div><!-- end of bar -->
	
	</header><!--end of header -->
	<div class="page-content">
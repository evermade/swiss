<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<![endif]-->

	<?php wp_head();?>
</head>
<body <?php body_class(); ?> data-vp-add-class="animated fadeIn">

  <!--[if lt IE 8]>
    <div class="chromeframe">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.    </div>
  <![endif]-->

<div class="body">
	<span id="top"></span>
	
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
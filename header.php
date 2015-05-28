<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Evermade Bare Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/dist/css/main.css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/vendor/fontawesome/css/font-awesome.min.css">

	<?php wp_head();?>
</head>
<body>

  <!--[if lt IE 8]>
    <div class="chromeframe">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.    </div>
  <![endif]-->

<div class="body">

<header class="header">
	
		<div class="nav-bar nav-bar--header">

			<div class="container">

				<a href="/" title="embaretheme" class="nav-bar__logo">embaretheme</a>

				<button class="mobile-menu-button mobile-menu-button--show"><i class="fa fa-bars"></i></button>
			
				<nav class="nav" role="navigation">
	              <?php wp_nav_menu(array('theme_location' => 'Primary Navigation', 'menu_class' => 'nav__list')); ?>
	          	</nav>

			</div><!-- end of wrapper -->

		</div><!-- end of bar -->

</header><!--end of header -->
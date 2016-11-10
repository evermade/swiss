<!--

	≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡
	 _________    _____
	|_________|  |  ___|                                   _
	 _________   | |_  __   _____ _ __ _ __ ___   __ _  __| | ___
	|_________|  |  _| \ \ / / _ \ '__| '_ ` _ \ / _` |/ _` |/ _ \
	 _________   | |___ \ V /  __/ |  | | | | | | (_| | (_| |  __/
	|_________|  |_____| \_/ \___|_|  |_| |_| |_|\__,_|\__,_|\___|

	              ≡ Evermade.fi - Design & Development

	≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡


-->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="//unpkg.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">

	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<![endif]-->

	<?php wp_head();?>

	<script>
	if (window.jQuery) {
	    if(!window.$) $ = jQuery;
	}
	else {
	    document.write('<script src="<?php echo get_template_directory_uri();?>/assets/vendor/jquery/dist/jquery.min.js"><\/script>');
	}
	</script>

	<?php include(get_template_directory().'/templates/ga-tracking.php'); ?>
</head>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="c-chromeframe">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.    </div>
  <![endif]-->

<div class="body">
	<span id="top"></span>
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
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//s3.amazonaws.com">

    <?php wp_head(); ?>

    <script>
    if (window.jQuery) {
        if(!window.$) $ = jQuery;
    }
    else {
        document.write('<script src="<?php echo get_template_directory_uri();?>/assets/node_modules/jquery/dist/jquery.min.js"><\/script>');
    }
    </script>

    <?php include(get_template_directory().'/templates/tracking.php'); ?>
</head>
<body <?php body_class(); ?>>

    <!--[if lt IE 8]>
        <div class="c-chromeframe">
            You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
        </div>
    <![endif]-->

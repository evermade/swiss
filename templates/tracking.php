<?php
global $app;

if(empty($app) || \Evermade\Swiss\isDev()) return false;

echo $app->get('opt_google_analytics');

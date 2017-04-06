<?php
global $app;

if(empty($app) || \Swiss\is_dev()) return false;

echo $app->get('opt_google_analytics');
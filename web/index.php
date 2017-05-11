<?php 

// Require dependendies
require_once __DIR__.'/../vendor/autoload.php';

// Init Silex
$app = new Silex\Application();
$app['debug'] = true;

// Create `hello` route
$app->get('/hello', function()
{
    return 'Hello!';
});

// Run Silex
$app->run();

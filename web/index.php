<?php 

// Require dependendies
require_once __DIR__.'/../vendor/autoload.php';

// Init Silex
$app = new Silex\Application();

//détaille les erreurs
$app['debug'] = true; //tableau associatif : $variable[tableau]

// Create `hello` route
$app->get('/hello', function()
{
    return 'Hello!';
});

//Créer une route dynamiquement
$app->get('/page/{number}', function ($number)
{
    return 'Page number : '.$number;
})
->assert('number', '\d+')
->value('number', '1');


// Run Silex
$app->run();

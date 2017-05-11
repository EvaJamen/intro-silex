<?php 

// Require dependendies
require_once __DIR__.'/../vendor/autoload.php';

// Init Silex
$app = new Silex\Application();

//détaille les erreurs
$app['debug'] = true; //tableau associatif : $variable[tableau]



// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/hello', function() use ($app)
{

    $data = array(
        'value' => 'Toto',
		'lorem' => array(
		'foo' => 'bar'
	)
    );

    return $app['twig']->render('example.twig', $data);
})
->bind('hello');



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
->value('number', '1')
->bind('page');






// Run Silex
$app->run();

<?php
require_once '../vendor/autoload.php';

set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

$view = new \Slim\Views\Twig();
$app = new \Slim\Slim(array(
    'view' => $view,
    'templates.path' => '../templates'
));

$app->get('/', function () use ($app) {
    $app->render('index.twig');
});

$app->get('/hello/:name', function ($name) use ($app) {
    $app->render('hello.twig', ['name' => $name]);
});

$app->run();

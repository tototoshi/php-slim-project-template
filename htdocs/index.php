<?php
require_once '../vendor/autoload.php';

use Example\Message;

set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

$view = new \Slim\Views\Twig();
$app = new \Slim\Slim(array(
    'view' => $view,
    'templates.path' => '../templates'
));

$app->get('/', function () use ($app) {
    $message = new Message();
    $app->render('index.twig', ['message' => $message->hello()]);
});

$app->get('/hello/:name', function ($name) use ($app) {
    $app->render('hello.twig', ['name' => $name]);
});

$app->run();

<?php
require_once '../vendor/autoload.php';

use Example\Message;

set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

$dsn = getenv("DB_DSN");
$pdo = new PDO($dsn);

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

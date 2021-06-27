<?php

require 'vendor/autoload.php';

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

// Дефолтный роутер
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello, Slim");
    return $response;
});

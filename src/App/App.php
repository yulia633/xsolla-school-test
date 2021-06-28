<?php

require __DIR__ . '/../../vendor/autoload.php';

use DI\Container;
use Slim\Factory\AppFactory;

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();
$container = $app->getContainer();

$app->addRoutingMiddleware();

require __DIR__ . '/Configs.php';
require __DIR__ . '/Dependencies.php';
require __DIR__ . '/Routes.php';
require __DIR__ . '/Services.php';
require __DIR__ . '/Models.php';

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();

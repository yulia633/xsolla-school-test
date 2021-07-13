<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Response;

abstract class BaseController
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function response(Response $response, array $responseData, int $code)
    {
        $response->getBody()->write(json_encode($responseData, JSON_UNESCAPED_UNICODE));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }
}

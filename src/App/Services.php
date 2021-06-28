<?php

use App\Services\ProductService;
use Psr\Container\ContainerInterface;

$container->set('service_product', function (ContainerInterface $container) {
    return new ProductService($container->get('model_product'));
});

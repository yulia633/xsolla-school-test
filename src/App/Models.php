<?php

use App\Models\Product;
use Psr\Container\ContainerInterface;

$container->set('model_product', function (ContainerInterface $container) {
    return new Product($container->get('db'));
});

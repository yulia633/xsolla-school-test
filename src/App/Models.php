<?php

use App\Models\Product;
use App\ProductMysqlStorage;
use Psr\Container\ContainerInterface;

$container->set('model_product', function (ContainerInterface $container) {
    return new ProductMysqlStorage($container->get('db'));
});

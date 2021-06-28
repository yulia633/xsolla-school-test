<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/v1', function (RouteCollectorProxy $group) {
    $group->get('/products', 'App\Controllers\ProductController:getAllProducts');

    $group->get('/products/{sku}', 'App\Controllers\ProductController:getProduct');

    $group->post('/products', 'App\Controllers\ProductController:addProduct');

    $group->put('/products/{sku}', 'App\Controllers\ProductController:updateProduct');

    $group->delete('/products/{sku}', 'App\Controllers\ProductController:deleteProduct');
});

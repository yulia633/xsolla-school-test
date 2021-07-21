<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Slim\Http\ServerRequest;
use Slim\Http\Response;

class ProductController extends BaseController
{
    public function getAllProducts(ServerRequest $request, Response $response, $args)
    {
        $params = $request->getQueryParams();
        $page = $params['page'] ?? 1;
        $per = $params['per'] ?? 5;
        $offset = ($page - 1) * $per;

        [$products, $paging] = $this->getProducts($offset, $per, $page);

        $responseData = [
            'data' => $products,
            'paging' => $paging
        ];

        return $this->response($response, $responseData, 200);
    }

    public function getProducts($offset, $amount, $page = 1)
    {
        $fullProducts = $this->container->get('service_product')->getAll();
        $products = array_slice($fullProducts, $offset, $amount);

        $paging = [
            'total' => ceil(count($fullProducts) / $amount),
            'current' => $page
        ];

        return [$products, $paging];
    }

    public function getProduct(ServerRequest $request, Response $response, $args)
    {
        $sku = $args['sku'];
        $product = $this->container->get('service_product')->getProductSku($sku);

        $responseData = [
            'data' => $product
        ];

        return $this->response($response, $responseData, 200);
    }

    public function addProduct(ServerRequest $request, Response $response)
    {
        $post = $request->getParsedBody();

        $sku = $post['sku'];
        $name = $post['name'];
        $price = $post['price'];
        $type = $post['type'];

        $products = $this->container->get('service_product')->getAll();
        $filtredProductSku = array_filter($products, function ($product) use ($sku) {
            return $product['sku'] === $sku;
        });

        if (empty($filtredProductSku)) {
            $this->container->get('service_product')->insert($sku, $name, $price, $type);
        }

        $responseData = [
            'data' => $post
        ];

        return $this->response($response, $responseData, 201);
    }

    public function updateProduct(ServerRequest $request, Response $response)
    {
        $post = $request->getParsedBody();

        $sku = $post['sku'];
        $name = $post['name'];
        $price = $post['price'];
        $type = $post['type'];

        $this->container->get('service_product')->update($sku, $name, $price, $type);

        $responseData = [
            'data' => $post
        ];

        return $this->response($response, $responseData, 200);
    }

    public function deleteProduct(ServerRequest $request, Response $response, $args)
    {
        $sku = $args['sku'];

        $product = $this->container->get('service_product')->delete($sku);

        $responseData = [
            'data' => $product
        ];

        return $this->response($response, $responseData, 201);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function getAllProducts($request, $response, $args)
    {
        $data = $this->container->get('service_product')->getAll();

        $per = 5;
        $page = $request->getQueryParam('page', 1);
        $offset = ($page - 1) * $per;
        $sliceOfData = array_slice($data, $offset, $per);

        if (!empty($data)) {
            $answer = [
                'result' => 'Success',
                'data' => $sliceOfData,
                'page' => $page
            ];
            $code = 200;
        } else {
            $answer = [
                'result' => 'ERROR_VALIDATION',
                'message' => 'Товаров нет.'
            ];
            $code = 404;
        }

        $response->getBody()->write(json_encode($answer));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }

    public function getProduct($request, $response, $args)
    {
        $sku = $args['sku'];

        if (!empty($sku)) {
            $data = $this->container->get('service_product')->getProductSku($sku);
            if (!empty($data)) {
                $answer = [
                    'result' => 'Success',
                    'data' => $data
                ];
                $code = 200;
            } else {
                $answer = [
                    'result' => 'ERROR_VALIDATION',
                    'message' => 'Товара не существует.'
                ];
                $code = 404;
            }
        }

        $response->getBody()->write(json_encode($answer));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }

    public function addProduct($request, $response, $args)
    {
        $post = $request->getQueryParams();

        $sku = $post['sku'];
        $name = $post['name'];
        $price = $post['price'];
        $type = $post['type'];


        $data = $this->container->get('service_product')->getAll();
        $data = json_decode(json_encode($data), true);

        $result = [];
        foreach ($data as $product) {
            if ($product['sku'] === $sku) {
                $result[] = $product['sku'];
            }
        }

        if (!empty($post) && empty($result)) {
            if (is_numeric($sku)) {
                $this->container->get('service_product')->insert($sku, $name, $price, $type);
                $answer = [
                    'result' => 'Success',
                    'message' => 'Товар успешно создан',
                    'data' => $post
                ];
                $code = 201;
            } else {
                $answer = [
                    'result' => 'ERROR_VALIDATION',
                    'message' => 'SKU должен быть числовым.'
                ];
                $code = 400;
            }
        } else {
            $answer = [
                'result' => 'ERROR_VALIDATION',
                'message' => 'Товар не создан. SKU должен быть уникальным'
            ];
            $code = 400;
        }

        $response->getBody()->write(json_encode($answer));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }

    public function updateProduct($request, $response, $args)
    {
        $post = $request->getQueryParams();

        $sku = $post['sku'];
        $name = $post['name'];
        $price = $post['price'];
        $type = $post['type'];

        $searchSku = $this->container->get('service_product')->getProductSku($sku);
        $searchSku = json_decode(json_encode($searchSku), true);

        if (!empty($post) && $searchSku) {
            if (is_numeric($sku)) {
                $this->container->get('service_product')->update($sku, $name, $price, $type);
                $answer = [
                    'result' => 'Success',
                    'message' => 'Товар успешно изменен',
                    'data' => $post
                ];
                $code = 200;
            } else {
                $answer = [
                    'result' => 'ERROR_VALIDATION',
                    'message' => 'SKU должен быть числовым.'
                ];
                $code = 400;
            }
        } else {
            $answer = [
                'result' => 'ERROR_VALIDATION',
                'message' => 'Товар не создан. Нет товара с таким SKU.'
            ];
            $code = 400;
        }

        $response->getBody()->write(json_encode($answer));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }

    public function deleteProduct($request, $response, $args)
    {
        $sku = $args['sku'];

        $data = $this->container->get('service_product')->getProductSku($sku);

        $data = json_decode(json_encode($data), true);

        if (!empty($data)) {
            $this->container->get('service_product')->delete((int)$sku);
            $answer = [
                'result' => 'Success',
                'message' => 'Товар успешно удален'
            ];
            $code = 201;
        } else {
            $answer = [
                'message' => 'ERROR_VALIDATION',
                'message' => 'Товара не существует.'
            ];
            $code = 404;
        }

        $response->getBody()->write(json_encode($answer));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    }
}

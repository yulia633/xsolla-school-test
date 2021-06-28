<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    protected $productModel;

    public function __construct(Product $model)
    {
        $this->productModel = $model;
    }

    public function getAll()
    {

        return $this->productModel->getAll();
    }

    public function get($id)
    {

        return $this->productModel->get($id);
    }

    public function getProductSku($sku)
    {

        return $this->productModel->findBySku($sku);
    }

    public function getProductId($id)
    {

        return $this->productModel->findById($id);
    }

    public function insert($sku, $name, $price, $type)
    {

        return $this->productModel->insert($sku, $name, $price, $type);
    }

    public function update($sku, $name, $price, $type)
    {

        return $this->productModel->update($sku, $name, $price, $type);
    }

    public function delete($sku)
    {

        return $this->productModel->delete($sku);
    }
}

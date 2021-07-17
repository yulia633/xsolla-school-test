<?php

namespace App\Services;

use App\ProductMysqlStorage;
use App\Models\Product;

class ProductService
{
    protected $productMysqlSrorage;

    public function __construct(ProductMysqlStorage $model)
    {
        $this->productMysqlSrorage = $model;
    }

    public function getAll()
    {

        return $this->productMysqlSrorage->getAll();
    }

    public function getProductSku($sku)
    {

        return $this->productMysqlSrorage->findBySku($sku);
    }

    public function getProductId($id)
    {

        return $this->productMysqlSrorage->findById($id);
    }

    public function insert($sku, $name, $price, $type)
    {

        return $this->productMysqlSrorage->insert($sku, $name, $price, $type);
    }

    public function update($sku, $name, $price, $type)
    {

        return $this->productMysqlSrorage->update($sku, $name, $price, $type);
    }

    public function delete($sku)
    {

        return $this->productMysqlSrorage->delete($sku);
    }
}

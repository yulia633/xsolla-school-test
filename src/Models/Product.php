<?php

namespace App\Models;

class Product
{
    protected $pdo;

    public function __construct($db)
    {
        $this->pdo = $db;
    }

    public function getAll()
    {
        $sql = "SELECT id, sku, name, price, type FROM products";

        $query = $this->pdo->query($sql);

        return $query->fetchAll();
    }

    public function get($id)
    {
        $sql = "SELECT id
        FROM products
        WHERE id = :id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':id', $id);

        $statement->execute();

        return $statement->fetch();
    }

    public function findBySku($sku)
    {
        $sql = "SELECT *
        FROM products
        WHERE sku = :sku";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':sku', $sku);

        $statement->execute();

        return $statement->fetch();
    }

    public function findById($id)
    {
        $sql = "SELECT *
        FROM products
        WHERE id = :id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':id', $id);

        $statement->execute();

        return $statement->fetchAll();
    }

    public function insert($sku, $name, $price, $type)
    {
        $sql = "INSERT INTO products (sku, name, price, type)
            VALUES (:sku, :name, :price, :type)";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':sku', $sku);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':type', $type);

        $statement->execute();
    }

    public function update($sku, $name, $price, $type)
    {
        $sql = "UPDATE products SET name = :name, price = :price, type = :type
            WHERE sku = :sku";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':sku', $sku);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':type', $type);

        $statement->execute();
    }

    public function delete($sku)
    {
        $sql = "DELETE FROM `products` WHERE `sku`=:sku";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':sku', $sku);

        $statement->execute();
    }
}

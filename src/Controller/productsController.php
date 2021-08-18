<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Products.php");
require_once("../Entity/Batches.php");

class ProductsController
{
    /**
     * Signup a new product in database
     *
     * @param Products $product
     * @return void
     */
    public function newProduct(Products $product): void
    {
        $sql = "
        INSERT INTO 
            products(name, price_product, quantity_inventory)
        VALUES(:name, :price_product, :quantity_inventory)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('name', $product->getName());
        $p_sql->bindValue('price_product', $product->getPriceProduct());
        $p_sql->bindValue('quantity_inventory', $product->getQuantityInventory());
        $p_sql->execute();
    }

    public function showAllProducts()
    {
        $sql = "SELECT * FROM product";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if($p_sql->rowCount() > 0) return $p_sql->fetchall();

        return false;
    }

    public function showSingleProducts($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('id', $id);
        $p_sql->execute();
        if($p_sql->rowCount() > 0) return $p_sql->fetch();

        return false;
    }
}

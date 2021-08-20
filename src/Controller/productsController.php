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
            products(name, price_product, quantity_inventory, discount)
        VALUES(:name, :price_product, :quantity_inventory, :discount)";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $product->getName());
        $pSql->bindValue('price_product', $product->getPriceProduct());
        $pSql->bindValue('quantity_inventory', $product->getQuantityInventory());
        $pSql->bindValue('discount', $product->getDiscount());
        $pSql->execute();
    }

    /**
     * Bring the entire products from database
     *
     * @return array|bool
     */
    public function showAllProducts()
    {
        $sql = "
        SELECT 
            * 
        FROM 
            products";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify product from database
     *
     * @param mixed $id
     * @return array|bool 
     */
    public function showSingleProducts($param)
    {
        $sql = "
        SELECT
            *
        FROM
            products
        WHERE
            id LIKE CONCAT(:param,'%') OR name LIKE CONCAT('%',:param,'%')
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

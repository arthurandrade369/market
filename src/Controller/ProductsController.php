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
     * @return array|bool Bring the products if have something or FALSE if dont have nothing
     */
    public function getAllProducts()
    {
        $sql = "
        SELECT 
            p.* 
        FROM 
            products AS p
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring the products by a search of name from database
     *
     * @param string $name
     * @return array|bool Bring the products if have something or FALSE if dont have nothing
     */
    public function searchProductsByName(string $name)
    {
        $sql = "
        SELECT
            p.*
        FROM
            products AS p
        WHERE
            p.name LIKE CONCAT('%',:name,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $name);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
    
    /**
     * Bring a specify product from database
     *
     * @param int $id
     * @return array|bool Bring the product if have something or FALSE if dont have nothing
     */
    public function searchProductsById(int $id)
    {
        $sql = "
        SELECT
            p.*
        FROM
            products AS p
        WHERE
            p.id = :id
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

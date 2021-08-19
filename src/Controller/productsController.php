<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Products.php");
require_once("../Entity/Batches.php");

class ProductsController
{

    /**
     * Signup a new batch of products in database
     *
     * @param Batches $batch
     * @return void
     */
    public function newBatch(Batches $batch){
        $sql = "
        INSERT INTO
            batches(fabrication_date, expiration_date, entry_date, quantity, used, sold_off, description, providers.id, products.id)
        VALUES
            (:fabrication_date, :expiration_date, :entry_date, :quantity, :used, :sold_off, :description, :providers.id, :products.id)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('fabrication_date', $batch->getFabricationDate());
        $pSql->bindValue('expiration_date',$batch->getExpirationDate());
        $pSql->bindValue('entry_date',$batch->getEntryDate());
        $pSql->bindValue('quantity',$batch->getQuantity());
        $pSql->bindValue('used',$batch->getUsed());
        $pSql->bindValue('sold_off',$batch->getSoldOff());
        $pSql->bindValue('description',$batch->getDescription());
        $pSql->bindValue('providers_id',$batch->getProvidersId());
        $pSql->bindValue('products_id',$batch->getProductsId());

        $pSql->execute();
    }

    public function showAllBatches(){
        $sql = "
        SELECT
            *
        FROM
            batches
        ";
    }

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

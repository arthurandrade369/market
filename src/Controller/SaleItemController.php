<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Sale.php");
require_once("../Entity/SaleItems.php");

class SaleItemController
{
    /**
     * Signup a new sale of products in database
     * @param Sale_items $sale
     * @return void
     */
    public function newSaleItem(SaleItems $sale)
    {
        $sql = "
        INSERT INTO
            sale_items(quantity_sale, price_total, products_id, sale_id)
        VALUES
            (:quantity_sale, :price_total, :products_id, :sale_id)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('quantity_sale', $sale->getQuantitySale());
        $pSql->bindValue('price_total', $sale->getPriceTotal());
        $pSql->bindValue('products_id', $sale->getProductsId());
        $pSql->bindValue('sale_id', $sale->getSaleId());

        $pSql->execute();
    }

    /**
     * Returns a array containing the entire sales from database
     * 
     * @return array - Returns sales if sucess or an empty array
     */
    public function getAllSaleItem(): array
    {
        $sql = "
        SELECT
            si.*, p.*
        FROM 
            sale_item AS si
            INNER JOIN products AS p ON p.id = si.product_id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing the sale item by a search of id from database
     *
     * @param int $id
     * @return array|null Returns the sale item if have or NULL if dont
     */
    public function searchSaleItemsById(int $id): ?array
    {
        $sql = "
        SELECT
            si.*, p.*
        FROM
            sale_item AS si
            INNER JOIN products AS p ON p.id = si.products_id AND si.id = :id
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

    /**
     * Returns a array containing the sale item by a search of products name from database
     *
     * @param string $name
     * @return array Returns the sale item if have something or an empty array
     */
    public function searchSaleItemsByProductName(string $name): array
    {
        $sql = "
        SELECT
            si.*, p.*
        FROM
            sale_item AS si
            INNER JOIN products AS p ON p.id = si.products_id AND p.name = :name
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $name);
        $pSql->execute();

        return $pSql->fetchAll();
    }
}

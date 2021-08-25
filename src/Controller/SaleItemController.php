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
    public function newSale(SaleItems $sale)
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
     * Bring the entire sales from database
     * 
     * @return array|bool - Bring sales if sucess or FALSE in failure
     */
    public function showAllSales()
    {
        $sql = "
        SELECT
            * 
        FROM 
            sale_item
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify sale from database
     *
     * @param mixed $id
     * @return array|bool 
     */
    public function showSingleSale($param)
    {
        $sql = "
        SELECT
            *
        FROM
            sale_item
        WHERE
            id = :param
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

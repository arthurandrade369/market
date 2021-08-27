<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Sale.php");
require_once("../Entity/SaleItems.php");

class SaleController
{
    /**
     * Signup a new sale of products in database
     *
     * @param Sale $sale
     * @return string|false Return the id if sucess or FALSE if failure
     */
    public function newSale(Sale $sale): string
    {
        $sql = "
        INSERT INTO
            sale(date, state, was_paid, payment_method, final_price, discount, shipping)
        VALUES
            (:date, :state, :was_paid, :payment_method, :final_price, :discount, :shipping)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('date', $sale->getDate());
        $pSql->bindValue('state', $sale->getState());
        $pSql->bindValue('was_paid', intval($sale->getWasPaid()));
        $pSql->bindValue('payment_method', $sale->getPaymentMethod());
        $pSql->bindValue('final_price', $sale->getFinalPrice());
        $pSql->bindValue('discount', $sale->getDiscount());
        $pSql->bindValue('shipping', $sale->getShipping());

        $pSql->execute();

        $lastId = Connection::getInstance()->lastInsertId();
        return $lastId;
    }

    /**
     * Returns a array containing the entire sales from database
     * 
     * @return array - Returns the sale if have something or an empty array
     */
    public function getAllSales(): array
    {
        $sql = "
        SELECT
            s.*, p.name AS product_name, si.quantity_sale, s.id AS sale_id
        FROM
            sale AS s
            INNER JOIN sale_items AS si ON s.id = si.sale_id
            INNER JOIN products AS p ON p.id = si.products_id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing the sale by a search of id from database
     *
     * @param int $int
     * @return array|null Returns the sale if have or NULL if dont
     */
    public function searchSaleById(int $id): ?array
    {
        $sql = "
        SELECT
            s.*, p.name AS product_name, si.quantity_sale, s.id AS sale_id
        FROM
            sale AS s
            INNER JOIN sale_items AS si ON s.id = si.sale_id
            INNER JOIN products AS p ON p.id = si.products_id AND s.id = :id
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

}

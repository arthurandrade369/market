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
     * Bring the entire buies from database
     * 
     * @return array|bool - Bring buies if sucess or FALSE in failure
     */
    public function showAllSales()
    {
        $sql = "
        SELECT
            *
        FROM
            sale AS s
            INNER JOIN sale_items AS si ON s.id = si.sale_id
            INNER JOIN products AS p ON p.id = si.products_id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify sale from database
     *
     * @param mixed $param
     * @return array|bool 
     */
    public function showSingleSales($param)
    {
        $sql = "
        SELECT
            s.*, p.*, si.*
        FROM
            sale AS s
            INNER JOIN sale_items AS si ON s.id = si.sale_id
            INNER JOIN products AS p ON p.id = si.products_id
        WHERE
            s.id = :param
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

}

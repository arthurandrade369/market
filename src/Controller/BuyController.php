<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Buy.php");
require_once("../Entity/SaleItems.php");

class BuyController
{
    /**
     * Signup a new buy of products in database
     *
     * @param Buy $buy
     * @return void
     */
    public function newBuy(Buy $buy)
    {
        $sql = "
        INSERT INTO
            buy(date, state, was_paid, payment_method, final_price, discount, shipping)
        VALUES
            (:date, :state, :was_paid, :payment_method, :final_price, :discount, :shipping)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('date', $buy->getDate());
        $pSql->bindValue('state', $buy->getState());
        $pSql->bindValue('was_paid', intval($buy->getWasPaid()));
        $pSql->bindValue('payment_method', $buy->getPaymentMethod());
        $pSql->bindValue('final_price', $buy->getFinalPrice());
        $pSql->bindValue('discount', $buy->getDiscount());
        $pSql->bindValue('shipping', $buy->getShipping());

        $pSql->execute();
    }

    /**
     * Signup a new sale of products in database
     * @param Sale_items $sale
     * @return void
     */
    public function newSale(Sale_items $sale)
    {
        $sql = "
        INSERT INTO
            sale_items(quantity_sale, price_total, product_id, buy_id)
        VALUES
            (:quantity_sale, :price_total, :product_id, :buy_id)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('quantity_sale', $sale->getQuantitySale());
        $pSql->bindValue('price_total', $sale->getPriceTotal());
        $pSql->bindValue('product_id', $sale->getProductsId());
        $pSql->bindValue('buy_id', $sale->getBuyId());

        $pSql->execute();
    }

    /**
     * Bring the entire buies from database
     * 
     * @return array|bool - Bring buies if sucess or FALSE in failure
     */
    public function showAllBuies()
    {
        $sql = "
        SELECT
            *
        FROM
            buy AS b
        INNER JOIN sale_items AS si ON b.id = si.buy_id
        INNER JOIN products AS p ON p.id = si.products_id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify buy from database
     *
     * @param mixed $id
     * @return array|bool 
     */
    public function showSingleBuy($param)
    {
        $sql = "
        SELECT
            *
        FROM
            buy AS b
        INNER JOIN sale_items AS si ON b.id = si.buy_id
        INNER JOIN products AS p ON p.id = si.products_id
        WHERE
            id = :param
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

    /**
     * Bring the last column added in database
     * 
     * @return array|bool Bring the last column if sucess or FALSE in failure
     */
    public function getLastColumn()
    {
        $sql = "
        SELECT
            *
        FROM
            buy
        ORDER BY id DESC
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

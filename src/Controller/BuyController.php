<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Buy.php");

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
        $pSql->bindValue('was_paid', $buy->getWasPaid());
        $pSql->bindValue('payment_method', $buy->getPaymentMethod());
        $pSql->bindValue('final_price', $buy->getFinalPrice());
        $pSql->bindValue('discount', $buy->getDiscount());
        $pSql->bindValue('shipping', $buy->getShipping());

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
            buy
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
            products
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
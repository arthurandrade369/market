<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Orders.php");

class OrdersController
{
    /**
     * Signup a new sale of products in database
     * @param Orders $sale
     * @return void
     */
    public function newOrder(Orders $order)
    {
        $sql = "
        INSERT INTO
            orders(type, receipt, forecast, clients_id, sale_id)
        VALUES
            (:type, :receipt, :forecast, :clients_id, :sale_id)
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('type', $order->getType());
        $pSql->bindValue('receipt', $order->getReceipt());
        $pSql->bindValue('forecast', $order->getForecast());
        $pSql->bindValue('clients_id', $order->getClientsId());
        $pSql->bindValue('sale_id', $order->getSaleId());

        $pSql->execute();
    }

    /**
     * Bring the entire orders from database
     * 
     * @return array|bool - Bring orders if sucess or FALSE in failure
     */
    public function showAllOrders()
    {
        $sql = "
        SELECT
            *, o.id AS oid
        FROM 
            orders AS o
            INNER JOIN sale AS s ON o.sale_id = s.id
            INNER JOIN clients AS c ON o.clients_id = c.id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify order from database
     *
     * @param mixed $id
     * @return array|bool 
     */
    public function showSingleOrder($param)
    {
        $sql = "
        SELECT
            *
        FROM
            orders
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

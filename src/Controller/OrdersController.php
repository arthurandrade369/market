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
     * @return array|bool - Bring the orders if have something or FALSE if dont have nothing
     */
    public function getAllOrders()
    {
        $sql = "
        SELECT
            o.*, c.*, s.*, o.id AS order_id
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
     * Bring a specify order by id from database
     *
     * @param int $id
     * @return array|bool Bring the order if have something or FALSE if dont have nothing
     */
    public function searchOrderById(int $id)
    {
        $sql = "
        SELECT
            o.*, c.*
        FROM
            orders AS o
            INNER JOIN clients AS c ON o.clients_id = c.id AND o.id = :id
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

    /**
     * Bring the order by a search for client name from database
     *
     * @param string $clientName
     * @return array|bool Bring the orders if have something or FALSE if dont have nothing
     */
    public function searchOrderByClient(string $clientName)
    {
        $sql = "
        SELECT
            o.*, c.*
        FROM
            orders AS o
            INNER JOIN clients AS c ON o.clients_id = c.id AND c.name LIKE CONCAT(:client_name,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('client_name', $clientName);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
    
}

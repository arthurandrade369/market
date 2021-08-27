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
     * Returns a array containing the entire orders from database
     * 
     * @return array - Returns the orders if have something or an empty array
     */
    public function getAllOrders(): array
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

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing a specify order by id from database
     *
     * @param int $id
     * @return array Returns the order if have or NULL if dont
     */
    public function searchOrderById(int $id): ?array
    {
        $sql = "
        SELECT
            o.*, c.*, s.*, o.id AS order_id
        FROM
            orders AS o
            INNER JOIN sale AS s ON o.sale_id = s.id
            INNER JOIN clients AS c ON o.clients_id = c.id AND o.id = :id
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

    /**
     * Returns a array containing the orders by a search for client name from database
     *
     * @param string $clientName
     * @return array Returns the orders if have something or an empty array
     */
    public function searchOrderByClient(string $clientName): array
    {
        $sql = "
        SELECT
            o.*, c.*, s.*, o.id AS order_id
        FROM
            orders AS o
            INNER JOIN sale AS s ON o.sale_id = s.id
            INNER JOIN clients AS c ON o.clients_id = c.id
        WHERE
            c.name LIKE CONCAT(:client_name,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('client_name', $clientName);
        $pSql->execute();

        return $pSql->fetchAll();
    }
}

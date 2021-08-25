<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Clients.php");
require_once("../Entity/ClientAddresses.php");

class ClientsController
{
    /**
     * Signup a new client in database
     * 
     * @param Clients $clients
     * @return string|false Return the id if sucess or FALSE if failure
     */
    public function newClient(Clients $clients): string
    {
        $sql = "
        INSERT INTO
            clients(name, email)
        VALUES
            (:name, :email)";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $clients->getName());
        $pSql->bindValue('email', $clients->getEmail());
        $pSql->execute();

        $lastId = Connection::getInstance()->lastInsertId();
        return $lastId;
    }

    /**
     * Signup a client address in database 
     *
     * @param ClientAdresses $addresses
     * @return void
     */
    public function newClientAddress(ClientAddresses $addresses): void
    {
        $sql = "
        INSERT INTO
            client_addresses(state,city,district,street,number,complement,postal_code,clients_id)
        VALUES
            (:state,:city,:district,:street,:number,:complement,:postal_code,:clients_id)";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('state', $addresses->getState());
        $pSql->bindValue('city', $addresses->getCity());
        $pSql->bindValue('district', $addresses->getDistrict());
        $pSql->bindValue('street', $addresses->getStreet());
        $pSql->bindValue('number', $addresses->getNumber());
        $pSql->bindValue('complement', $addresses->getComplement());
        $pSql->bindValue('postal_code', $addresses->getPostalCode());
        $pSql->bindValue('clients_id', $addresses->getClientsId());
        $pSql->execute();
    }

    /**
     * Bring the entire clients from database
     * 
     * @return array|bool - Bring clients if sucess or FALSE in failure
     */
    public function showAllClients()
    {
        $sql = "
        SELECT
            c.*, ca.* 
        FROM 
            clients AS c 
            INNER JOIN clients_addresses AS ca ON c.id = ca.clients_id";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify client from database
     * 
     * @param array $name|$email
     * @return array|bool Bring the client if sucess or FALSE in failure
     */
    public function showSingleClients($param)
    {
        $sql = "
        SELECT
            c.*, ca.*
        FROM
            clients AS c INNER JOIN  clients_addresses AS ca ON c.id = ca.clients_id
        WHERE
            c.email LIKE CONCAT(:param,'%') OR c.name LIKE CONCAT(:param,'%')
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

    /**
     * Verify if the entry of email already exists in database 
     * 
     * @param string $email
     * @return boolean TRUE if the email dont exists or FALSE if exists
     */
    public function checkIsEmail(string $email): bool
    {
        $sql = "
        SELECT 
            c.email 
        FROM 
            clients AS c 
        WHERE  
            c.email = :email";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('email', $email);
        $pSql->execute();

        if ($pSql->rowCount() > 0) return false;

        return true;
    }

}

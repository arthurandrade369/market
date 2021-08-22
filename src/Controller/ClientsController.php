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
     * @return void
     */
    public function newClient(Clients $clients): void
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
    }

    /**
     * Signup a client address in database 
     *
     * @param ClientAdresses $addresses
     * @return void
     */
    public function newClientAddress(ClientAddresses $addresses): void
    {
        $aws = $this->getLastColumn();
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
        $pSql->bindValue('clients_id', $aws['id']);
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
            * 
        FROM 
            clients c 
            INNER JOIN  client_addresses ca ON c.id = ca.clients_id";
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
            * 
        FROM 
            clients c INNER JOIN  client_addresses ca ON c.id = ca.clients_id 
        WHERE c.email LIKE CONCAT(:param,'%') OR c.name LIKE CONCAT(:param,'%')
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
            email 
        FROM 
            clients 
        WHERE  
            email = :email";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('email', $email);
        $pSql->execute();

        if ($pSql->rowCount() > 0) return false;

        return true;
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
            clients
        ORDER BY id DESC
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

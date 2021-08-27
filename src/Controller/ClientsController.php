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
     * @return string|false Return the id in time of register
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
     * Return a array containing the entire clients from database
     * 
     * @return array - Returns the client if have something or an empty array
     */
    public function getAllClients(): array
    {
        $sql = "
            SELECT
                c.*, ca.* 
            FROM 
                clients AS c 
                INNER JOIN client_addresses AS ca ON c.id = ca.clients_id
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Return a array containing all clients by a search of id from database
     *
     * @param int $id
     * @return array|null Returns the client if have or NULL if dont
     */
    public function searchClientById(int $id): ?array
    {
        $sql = "
            SELECT
                c.*, ca.*
            FROM
                clients AS c 
                INNER JOIN  clients_addresses AS ca ON c.id = ca.clients_id AND c.id = :id
            LIMIT 1
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('id', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

    /**
     * Returns a array containing all clients by a search of name from database
     *
     * @param string $name
     * @return array Returns the client if have something or an empty array
     */
    public function searchClientByName(string $name): array
    {
        $sql = "
            SELECT
                c.*, ca.*
            FROM
                clients AS c 
                INNER JOIN  client_addresses AS ca ON c.id = ca.clients_id 
            WHERE
                c.name LIKE CONCAT(:name,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $name);
        $pSql->execute();

        return $pSql->fetchAll();;
    }

    /**
     * Return a array containing all clients by a search of email from database
     *
     * @param string $email
     * @return array|null Returns the client if have or NULL if dont
     */
    public function searchClientByEmail(string $email): ?array
    {
        $sql = "
            SELECT
                c.*, ca.*
            FROM
                clients AS c 
                INNER JOIN  clients_addresses AS ca ON c.id = ca.clients_id AND c.email = :email
            LIMIT 1
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('email', $email);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

    /**
     * Checks if the email exists and returns customer data
     * 
     * @param string $email
     * @return array|null Return a array containing the client or NULL if dont exist
     */
    public function checkIsEmail(string $email): ?array
    {
        $sql = "
            SELECT 
                c.* 
            FROM 
                clients AS c 
            WHERE  
                c.email = :email
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('email', $email);
        $pSql->execute();

        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }
}

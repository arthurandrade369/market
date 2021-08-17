<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Clients.php");
require_once("../Entity/ClientAddresses.php");

class ClientsController
{
    /**
     * @param Clients $clients
     * @return void
     */
    public function newClient(Clients $clients): void
    {
        $sql = "INSERT INTO clients(name, email) VALUES(:name, :email)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('name', $clients->getName());
        $p_sql->bindValue('email', $clients->getEmail());
        $p_sql->execute();
    }

    /**
     * @param ClientAdresses $addresses
     * @return void
     */
    public function newClientAddress(ClientAdresses $addresses): void
    {
        $aws = $this->getLastColumn();
        $sql = "INSERT INTO client_addresses(state,city,district,street,number,complement,postal_code,clients_id)
        VALUES(:state,:city,:district,:street,:number,:complement,:postal_code,:clients_id)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('state', $addresses->getState());
        $p_sql->bindValue('city', $addresses->getCity());
        $p_sql->bindValue('district', $addresses->getDistrict());
        $p_sql->bindValue('street', $addresses->getStreet());
        $p_sql->bindValue('number', $addresses->getNumber());
        $p_sql->bindValue('complement', $addresses->getComplement());
        $p_sql->bindValue('postal_code', $addresses->getPostal_code());
        $p_sql->bindValue('clients_id', $aws['id']);
        $p_sql->execute();
    }

    /**
     * @return array|bool
     */
    public function showAllClients()
    {
        $sql = "SELECT * FROM clients c JOIN  client_addresses a WHERE c.id = a.id";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetchall();

        return false;
    }

    /**
     * @param array $email
     * @return array|bool
     */
    public function showSingleClients($id)
    {
        $sql = "SELECT * FROM clients c JOIN  client_addresses a on c.id = a.id WHERE c.id = :id LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('id',$id);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetch();

        return false;
    }
    
    /**
     * @param string $email
     * @return boolean
     */
    public function checkIsEmail(string $email): bool
    {
        $sql = "SELECT email FROM clients WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $email);
        $p_sql->execute();

        if ($p_sql->rowCount() > 0) return false;

        return true;
    }

    /**
     * @return array|bool
     */
    public function getLastColumn()
    {
        $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetch();

        return false;
    }
}

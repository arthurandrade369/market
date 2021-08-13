<?php

require_once("../../config/connection-db.php");
require_once("../Entity/clients.php");
require_once("../Entity/client_adresses.php");

class ClientsController
{
    public function newClient(Clients $clients)
    {
        $sql = "INSERT INTO clients(name, email) VALUES(:name, :email) LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('name', $clients->getName());
        $p_sql->bindValue('email', $clients->getEmail());
        $p_sql->execute();
    }

    public function newClientAddress(Client_adresses $addresses)
    {
        $sql = "INSERT INTO client_addresses(state,city,district,street,number,complement,postal_code,clients_id)
        VALUES(:state,:city,:district,:street,:number,:complement,:postal_code,:clients_id) LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('state', $addresses->getState());
        $p_sql->bindValue('city', $addresses->getCity());
        $p_sql->bindValue('district', $addresses->getDistrict());
        $p_sql->bindValue('street', $addresses->getStreet());
        $p_sql->bindValue('number', $addresses->getNumber());
        $p_sql->bindValue('complement', $addresses->getComplement());
        $p_sql->bindValue('postal_code', $addresses->getPostal_code());
        $p_sql->bindValue('clients_id', $addresses->getClients_id());
        $p_sql->execute();
    }

    public function checkIsEmail(string $email): bool
    {
        $sql = "SELECT email FROM clients WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $email);
        $p_sql->execute();

        if ($p_sql->rowCount() > 0) return false;

        return true;
    }

    


}

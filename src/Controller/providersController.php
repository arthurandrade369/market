<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Providers.php");
require_once("../Entity/ProvidersAddresses.php");

class ProvidersController
{
    /**
     * @param Providers $providers
     * @return void
     */
    public function newProviders(Providers $providers): void
    {
        $sql = "INSERT INTO providers(name, cnpj) VALUES(:name, :cnpj)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('name', $providers->getName());
        $p_sql->bindValue('cnpj', $providers->getCnpj());
        $p_sql->execute();
    }

    /**
     * @param ProvidersAddresses $addresses
     * @return void
     */
    public function newProvidersAddress(ProvidersAddresses $addresses): void
    {
        $aws = $this->getLastColumn();
        $sql = "INSERT INTO providers_addresses(state,city,district,street,number,complement,postal_code,providers_id)
        VALUES(:state,:city,:district,:street,:number,:complement,:postal_code,:providers_id)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('state', $addresses->getState());
        $p_sql->bindValue('city', $addresses->getCity());
        $p_sql->bindValue('district', $addresses->getDistrict());
        $p_sql->bindValue('street', $addresses->getStreet());
        $p_sql->bindValue('number', $addresses->getNumber());
        $p_sql->bindValue('complement', $addresses->getComplement());
        $p_sql->bindValue('postal_code', $addresses->getPostal_code());
        $p_sql->bindValue('providers_id', $aws['id']);
        $p_sql->execute();
    }

    /**
     * @return array|bool
     */
    public function showAllProviders()
    {
        $sql = "SELECT * FROM providers p JOIN  providers_addresses a WHERE p.id = a.id";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetchall();

        return false;
    }

    /**
     * @param array $email
     * @return array|bool
     */
    public function showSingleProviders($id)
    {
        $sql = "SELECT * FROM providers p JOIN  providers_addresses a on p.id = a.id WHERE c.id = :id LIMIT 1";
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
    public function checkIsCnpj(string $cnpj): bool
    {
        $sql = "SELECT cnpj FROM providers WHERE cnpj = :cnpj";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('cnpj', $cnpj);
        $p_sql->execute();

        if ($p_sql->rowCount() > 0) return false;

        return true;
    }

    /**
     * @return array|bool
     */
    public function getLastColumn()
    {
        $sql = "SELECT * FROM providers ORDER BY id DESC LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetch();

        return false;
    }
}

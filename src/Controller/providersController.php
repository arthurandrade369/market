<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Providers.php");
require_once("../Entity/ProvidersAddresses.php");

class ProvidersController
{
    /**
     * Signup a new provider
     * 
     * @param Providers $providers
     * @return void
     */
    public function newProviders(Providers $providers): void
    {
        $sql = "INSERT INTO providers(name, cnpj, social_reason) VALUES(:name, :cnpj, :social_reason)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('name', $providers->getName());
        $p_sql->bindValue('cnpj', $providers->getCnpj());
        $p_sql->bindValue('social_reason', $providers->getSocialreason());
        $p_sql->execute();
    }

    /**
     * Signup a address of a provider
     * 
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
        $p_sql->bindValue('postal_code', $addresses->getPostalCode());
        $p_sql->bindValue('providers_id', $aws['id']);
        $p_sql->execute();
    }

    /**
     * Bring the entire providers from database
     * 
     * @return array|bool
     */
    public function showAllProviders()
    {
        $sql = "
            SELECT 
                * 
            FROM
                providers AS p 
                INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetchall();

        return false;
    }

    /**
     * Bring a specify provider of database
     * 
     * @param array $email
     * @return array|bool
     */
    public function showSingleProviders($id)
    {
        $sql = "
        SELECT 
            * 
        FROM 
            providers AS p 
            INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id AND p.id = :id
        LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('id', $id);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) return $p_sql->fetch();

        return false;
    }

    /**
     * Verify if the entry of cnpj already exists in database
     * 
     * @param string $cnpj
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
     * Bring the last column added in database
     * 
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

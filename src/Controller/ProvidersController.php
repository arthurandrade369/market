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
     * @return string|false Return the id if sucess or FALSE if failure
     */
    public function newProviders(Providers $providers): string
    {
        $sql = "
        INSERT INTO
            providers(name, cnpj, social_reason)
        VALUES
            (:name, :cnpj, :social_reason)";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $providers->getName());
        $pSql->bindValue('cnpj', $providers->getCnpj());
        $pSql->bindValue('social_reason', $providers->getSocialreason());
        $pSql->execute();

        $lastId = Connection::getInstance()->lastInsertId();
        return $lastId;
    }

    /**
     * Signup a address of a provider
     * 
     * @param ProvidersAddresses $addresses
     * @return void
     */
    public function newProvidersAddress(ProvidersAddresses $addresses)
    {
        $sql = "
        INSERT INTO providers_addresses
            (state,city,district,street,number,complement,postal_code,providers_id)
        VALUES
            (:state,:city,:district,:street,:number,:complement,:postal_code,:providers_id)";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('state', $addresses->getState());
        $pSql->bindValue('city', $addresses->getCity());
        $pSql->bindValue('district', $addresses->getDistrict());
        $pSql->bindValue('street', $addresses->getStreet());
        $pSql->bindValue('number', $addresses->getNumber());
        $pSql->bindValue('complement', $addresses->getComplement());
        $pSql->bindValue('postal_code', $addresses->getPostalCode());
        $pSql->bindValue('providers_id', $addresses->getProvidersId());
        $pSql->execute();
    }

    /**
     * Bring the entire providers from database
     * 
     * @return array|bool Bring the providers if have something or FALSE if dont have nothing
     */
    public function getAllProviders()
    {
        $sql = "
            SELECT
                p.*, pa.*
            FROM
                providers AS p
                INNER JOIN provider_addresses AS pa ON p.id = pa.providers_id";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring the providers by a serach of name from database
     * 
     * @param string $name
     * @return array|bool Bring the providers if have something or FALSE if dont have nothing
     */
    public function searchProvidersByName(string $name)
    {
        $sql = "
        SELECT
            p.*
        FROM
            providers AS p 
            INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id AND p.name LIKE CONCAT(:name,'%')";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $name);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

    /**
     * Bring a specify provider of database
     * 
     * @param string $cnpj
     * @return array|bool Bring the provider if have something or FALSE if dont have nothing
     */
    public function searchProvidersByCnpj(string $cnpj)
    {
        $sql = "
        SELECT
            p.*
        FROM
            providers AS p 
            INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id AND p.cnpj = :cnpj
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('cnpj', $cnpj);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }

    /**
     * Verify if the entry of cnpj already exists in database
     * 
     * @param string $cnpj
     * @return boolean FALSE if the cnpj exists or TRUE if dont
     */
    public function checkIsCnpj(string $cnpj): bool
    {
        $sql = "
        SELECT
            cnpj
        FROM
            providers
        WHERE
            cnpj = :cnpj";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('cnpj', $cnpj);
        $pSql->execute();

        if ($pSql->rowCount() > 0) return false;

        return true;
    }

}

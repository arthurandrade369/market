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
     * Returns a array containing the entire providers from database
     * 
     * @return array Returns the providers if have something or an empty array
     */
    public function getAllProviders(): array
    {
        $sql = "
            SELECT
                p.*, pa.*
            FROM
                providers AS p
                INNER JOIN provider_addresses AS pa ON p.id = pa.providers_id";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing the providers by a serach of name from database
     * 
     * @param string $name
     * @return array Returns the providers if have something or an empty array
     */
    public function searchProvidersByName(string $name): array
    {
        $sql = "
        SELECT
            p.*, pa.*
        FROM
            providers AS p 
            INNER JOIN provider_addresses AS pa ON p.id = pa.providers_id
        WHERE
            p.name LIKE CONCAT(:name,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('name', $name);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing a specify provider of database
     * 
     * @param string $cnpj
     * @return array|null Returns the provider if have or NULL if dont
     */
    public function searchProvidersByCnpj(string $cnpj): ?array
    {
        $sql = "
        SELECT
            p.*
        FROM
            providers AS p 
            INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id AND p.cnpj = :cnpj
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('cnpj', $cnpj);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

    /**
     * Checks if the cnpj exists and returns provider data
     * 
     * @param string $cnpj
     * @return array|null Return a array containing the provider or NULL if dont exist
     */
    public function checkIsCnpj(string $cnpj): ?array
    {
        $sql = "
        SELECT
            p.*
        FROM
            providers AS p
        WHERE
            cnpj = :cnpj
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('cnpj', $cnpj);
        $pSql->execute();

        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }

}

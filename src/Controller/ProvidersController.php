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
        $pSql->bindValue('providers_id', $aws['id']);
        $pSql->execute();
    }

    /**
     * Bring the entire providers from database
     * 
     * @return array|bool Bring the providers if sucess or FALSE in failure
     */
    public function showAllProviders()
    {
        $sql = "
            SELECT
                *
            FROM
                providers AS p
                INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchall();

        return false;
    }

    /**
     * Bring a specify provider of database
     * 
     * @param array $email
     * @return array|bool Bring the provider if sucess or FALSE in failure
     */
    public function showSingleProviders($param)
    {
        $sql = "
        SELECT
            *
        FROM
            providers AS p 
            INNER JOIN providers_addresses AS pa ON p.id = pa.providers_id 
        WHERE
            p.cnpj LIKE CONCAT(:param,'%') OR p.name LIKE CONCAT(:param,'%')
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
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
            providers
        ORDER BY
            id DESC
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}
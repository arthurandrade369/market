<?php

require_once("../../config/connection-db.php");
require_once("../Entity/Batches.php");

class BatchesController
{
    /**
     * Signup a new batch of products in database
     *
     * @param Batches $batch
     * @return void
     */
    public function newBatch(Batches $batch): void
    {
        $sql = "
            INSERT INTO
                batches(fabrication_date, expiration_date, entry_date, quantity, used, sold_off, description, providers_id, products_id)
            VALUES
                (:fabrication_date, :expiration_date, :entry_date, :quantity, :used, :sold_off , :description, :providers_id, :products_id)
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('fabrication_date', $batch->getFabricationDate());
        $pSql->bindValue('expiration_date', $batch->getExpirationDate());
        $pSql->bindValue('entry_date', $batch->getEntryDate());
        $pSql->bindValue('quantity', $batch->getQuantity());
        $pSql->bindValue('used', intval($batch->getUsed()));
        $pSql->bindValue('sold_off', intval($batch->getSoldOff()));
        $pSql->bindValue('description', $batch->getDescription());
        $pSql->bindValue('providers_id', $batch->getProvidersId());
        $pSql->bindValue('products_id', $batch->getProductsId());

        $pSql->execute();
    }

    /**
     * Returns a array containing all batches from database
     *
     * @return array Returns the batches if have something or a empty array
     */
    public function getAllBatches() :array
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id
        ";

        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing all batches by a search of product name from database
     * 
     * @param string $productName
     * @return array Returns the batches if have something or an empty array
     */
    public function searchBatchesByProductName(string $productName): array
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id 
            WHERE    
                pd.name LIKE CONCAT('%',:productname,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('productname', $productName);
        $pSql->execute();

        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing all batches by a search of provider name from database
     * 
     * @param string $providerName
     * @return array Returns the batches if have something or an empty array
     */
    public function searchBatchesByProviderName(string $providerName): array
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id 
            WHERE
                pv.name LIKE CONCAT('%',:providername,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('providername', $providerName);
        $pSql->execute();
        return $pSql->fetchAll();
    }

    /**
     * Returns a array containing a specific batch by a search of id from database
     *
     * @param integer $id Id of the wanted batch
     * @return array|null Returns the batch if have or NULL if dont
     */
    public function searchABatchById(int $id): ?array
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id AND b.id = :id
            LIMIT 1
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $id);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return null;
    }
}

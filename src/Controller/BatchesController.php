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

        $test = $batch->getUsed();
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
     * Bring all the batches from database
     *
     * @return array|bool Bring the batches if have something or FALSE if dont have nothing
     */
    public function catchAllBatches()
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

        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return false;
    }

    /**
     * Bring all of batches by a search from database
     * 
     * @param string $productName
     * @return array|bool Bring the batches if sucess or FALSE in failure
     */
    public function catchBatchesByProductName(string $productName)
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id AND pd.name LIKE CONCAT('%',:productname,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('productname', $productName);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return false;
    }

    /**
     * Bring all of batches by a search from database
     * 
     * @param string $providerName
     * @return array|bool Bring the batches if sucess or FALSE in failure
     */
    public function catchBatchesByProviderName(string $providerName)
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id AND pv.name LIKE CONCAT('%',:providername,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('providername', $providerName);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return false;
    }

    /**
     * Bring all of batches by a search from database
     * 
     * @param string $productName
     * @param string $providerName
     * @return array|bool Bring the batches if sucess or FALSE in failure
     */
    public function catchBatchesByProviderNameAndProductName(string $productName, string $providerName)
    {
        $sql = "
            SELECT
                b.*, pd.name AS pd_name, pv.name AS pv_name
            FROM
                batches AS b
                INNER JOIN products AS pd ON b.products_id = pd.id
                INNER JOIN providers AS pv ON b.providers_id = pv.id 
            WHERE 
                pd.name LIKE CONCAT('%',:productname,'%') AND pv.name LIKE CONCAT('%',:providername,'%')
        ";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('productname', $productName);
        $pSql->bindValue('providername', $providerName);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetchAll();

        return false;
    }

    /**
     * Bring a specify batch from database
     *
     * @param integer $id
     * @return array|false
     */
    public function catchABatchById(int $id)
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
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

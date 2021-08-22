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
     * Bring the entire batches from database
     *
     * @return array|bool Bring the batches if sucess or FALSE in failure
     */
    public function showAllBatches()
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
     * Bring a specify batch from database
     * 
     * @param int $id
     * @return array|bool Bring the batch if sucess or FALSE in failure
     */
    public function showSingleBatch($param)
    {
        $sql = "
        SELECT
            b.*, pd.name AS pd_name, pv.name AS pv_name
        FROM
            batches AS b
        INNER JOIN products AS pd ON b.products_id = pd.id
        INNER JOIN providers AS pv ON b.providers_id = pv.id
        WHERE b.id = :param
        LIMIT 1";
        $pSql = Connection::getInstance()->prepare($sql);
        $pSql->bindValue('param', $param);
        $pSql->execute();
        if ($pSql->rowCount() > 0) return $pSql->fetch();

        return false;
    }
}

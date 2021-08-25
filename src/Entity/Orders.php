<?php

class Orders
{
    private int $id;
    private string $type;
    private string $receipt;
    private string $forecast;
    private int $clientsId;
    private int $SaleId;

    /**
     * Get the value of id
     * 
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */
    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of type
     * 
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     * @return  self
     */
    public function setType(?string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of receipt
     * 
     * @return string
     */
    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    /**
     * Set the value of receipt
     *
     * @param string $receipt
     * @return  self
     */
    public function setReceipt(?string $receipt)
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * Get the value of forecast
     * 
     * @return string
     */
    public function getForecast(): ?string
    {
        return $this->forecast;
    }

    /**
     * Set the value of forecast
     *
     * @param string $forecast
     * @return  self
     */
    public function setForecast(?string $forecast)
    {
        $this->forecast = $forecast;

        return $this;
    }

    /**
     * Get the value of clientsId
     * 
     * @return int
     */
    public function getClientsId(): ?int
    {
        return $this->clientsId;
    }

    /**
     * Set the value of clientsId
     *
     * @param int $clientsId
     * @return  self
     */
    public function setClientsId(?int $clientsId)
    {
        $this->clientsId = $clientsId;

        return $this;
    }

    /**
     * Get the value of saleId
     * 
     * @return int
     */
    public function getSaleId(): ?int
    {
        return $this->saleId;
    }

    /**
     * Set the value of saleId
     *
     * @param int $saleId
     * @return  self
     */
    public function setSaleId(?int $saleId)
    {
        $this->saleId = $saleId;

        return $this;
    }

    /**
     * Set the main attributes of class
     *
     * @param object|array $object
     * @return void
     */
    public function setObject($object)
    {
        $this->setType($object['type']);
        $this->setReceipt($object['receipt']);
        $this->setForecast($object['forecast']);
        $this->setClientsId($object['clients_id']);
        $this->setSaleId($object['sale_id']);

        return $this;
    }
}

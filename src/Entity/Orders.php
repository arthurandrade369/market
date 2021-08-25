<?php

class Orders
{
    private int $id;
    private string $type;
    private string $receipt;
    private string $forecast;
    private int $clientsId;
    private int $saleId;

    /**
     * Get the value of id
     * 
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of type
     * 
     * @return string|null
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
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of receipt
     * 
     * @return string|null
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
    public function setReceipt(string $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * Get the value of forecast
     * 
     * @return string|null
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
    public function setForecast(string $forecast): self
    {
        $this->forecast = $forecast;

        return $this;
    }

    /**
     * Get the value of clientsId
     * 
     * @return int|null
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
    public function setClientsId(int $clientsId): self
    {
        $this->clientsId = $clientsId;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return int|null
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
    public function setSaleId(int $saleId): self
    {
        $this->saleId = $saleId;

        return $this;
    }

    /**
     * Set the main attributes of class
     *
     * @param object|array $object
     * @return self
     */
    public function setObject($object): self
    {
        $this->setType($object['type']);
        $this->setReceipt($object['receipt']);
        $this->setForecast($object['forecast']);
        $this->setClientsId($object['clients_id']);
        $this->setSaleId($object['sale_id']);

        return $this;
    }
}

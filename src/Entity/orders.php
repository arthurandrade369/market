<?php

class Orders
{
    private int $id;
    private string $type;
    private string $receipt;
    private string $forecast;
    private int $clientsId;
    private int $buyId;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of receipt
     */ 
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * Set the value of receipt
     *
     * @return  self
     */ 
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * Get the value of forecast
     */ 
    public function getForecast()
    {
        return $this->forecast;
    }

    /**
     * Set the value of forecast
     *
     * @return  self
     */ 
    public function setForecast($forecast)
    {
        $this->forecast = $forecast;

        return $this;
    }

    /**
     * Get the value of clientsId
     */ 
    public function getClientsId()
    {
        return $this->clientsId;
    }

    /**
     * Set the value of clientsId
     *
     * @return  self
     */ 
    public function setClientsId($clientsId)
    {
        $this->clientsId = $clientsId;

        return $this;
    }

    /**
     * Get the value of buyId
     */ 
    public function getBuyId()
    {
        return $this->buyId;
    }

    /**
     * Set the value of buyId
     *
     * @return  self
     */ 
    public function setBuyId($buyId)
    {
        $this->buyId = $buyId;

        return $this;
    }
}

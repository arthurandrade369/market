<?php

class Orders
{
    private int $id;
    private string $type;
    private string $receipt;
    private string $forecast;
    private int $clients_id;
    private int $buy_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    public function setReceipt(string $receipt)
    {
        $this->receipt = $receipt;
    }

    public function getForecast(): ?string
    {
        return $this->forecast;
    }

    public function setForecast(string $forecast)
    {
        $this->forecast = $forecast;
    }

    public function getClients_id(): ?int
    {
        return $this->clients_id;
    }

    public function setClients_id(int $clients_id)
    {
        $this->clients_id = $clients_id;
    }

    public function getBuy_id(): ?int
    {
        return $this->buy_id;
    }

    public function setBuy_id(int $buy_id)
    {
        $this->buy_id = $buy_id;
    }
}

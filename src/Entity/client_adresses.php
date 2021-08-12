<?php

class Client_adresses
{
    private $id;
    private $state;
    private $city;
    private $district;
    private $street;
    private $number;
    private $complement;
    private $postal_code;
    private $clients_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district)
    {
        $this->district = $district;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(string $complement)
    {
        $this->complement = $complement;
    }

    public function getPostal_code(): ?string
    {
        return $this->postal_code;
    }

    public function setPostal_code(string $postal_code)
    {
        $this->postal_code = $postal_code;
    }

    public function getClients_id(): ?int
    {
        return $this->clients_id;
    }

    public function setClients_id(int $clients_id)
    {
        $this->clients_id = $clients_id;
    }
}

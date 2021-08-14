<?php

class Providers_addresses
{
    private int $id;
    private string $state;
    private string $city;
    private string $district;
    private string $street;
    private string $number;
    private string $complement;
    private string $postal_code;
    private int $providers_id;

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

    public function getProviders_id(): ?int
    {
        return $this->providers_id;
    }

    public function setProviders_id(int $providers_id)
    {
        $this->providers_id = $providers_id;
    }

    public function setObject($object)
    {
        $this->setState($object['state']);
        $this->setCity($object['city']);
        $this->setDistrict($object['district']);
        $this->setStreet($object['street']);
        $this->setNumber($object['number']);
        $this->setComplement($object['complement']);
        $this->setPostal_code($object['postal_code']);
        $this->setProviders_id($object['providers_id']);

        return $this;
    }
}

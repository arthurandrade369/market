<?php
require_once("../Interface/InterfaceSetter.php");

class ClientAddresses implements setObject
{
    private int $id;
    private string $state;
    private string $city;
    private string $district;
    private string $street;
    private string $number;
    private ?string $complement;
    private string $postalCode;
    private int $clientsId;

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
     * Get the value of state
     * 
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     * @return  self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of city
     * 
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     * @return  self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of district
     * 
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @param string $disctrict
     * @return  self
     */
    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of street
     * 
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @param string $street
     * @return  self
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of number
     * 
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @param string $number
     * @return  self
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of complement
     * 
     * @return string|null
     */
    public function getComplement(): ?string
    {
        return $this->complement;
    }

    /**
     * Set the value of complement
     *
     * @param string|null $complement
     * @return  self
     */
    public function setComplement(?string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get the value of postalCode
     * 
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @param string $postalCode
     * @return self
     */
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

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
     * @return self
     */
    public function setClientsId(int $clientsId): self
    {
        $this->clientsId = $clientsId;

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
        $this->setState($object['state']);
        $this->setCity($object['city']);
        $this->setDistrict($object['district']);
        $this->setStreet($object['street']);
        $this->setNumber($object['number']);
        if (!is_null($object['complement'])) $this->setComplement($object['complement']);
        $this->setPostalCode($object['postal_code']);
        $this->setClientsId($object['clientId']);

        return $this;
    }
}

<?php
require_once("../Interface/InterfaceSetter.php");

class Providers implements setObject
{
    private int $id;
    private string $name;
    private string $cnpj;
    private string $socialReason;

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
     * Get the value of name
     * 
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cnpj
     * 
     * @return string|null
     */
    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     * 
     *@param string $cnpj
     * @return  self
     */
    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of socialReason
     * 
     * @return string|null
     */
    public function getSocialReason(): ?string
    {
        return $this->socialReason;
    }

    /**
     * Set the value of socialReason
     *
     * @param string $socialReason
     * @return  self
     */
    public function setSocialReason(string $socialReason): self
    {
        $this->socialReason = $socialReason;

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
        $this->setName($object['name']);
        $this->setCnpj($object['cnpj']);
        $this->setSocialreason($object['socialreason']);

        return $this;
    }
}

<?php

class Providers
{
    private int $id;
    private string $name;
    private string $cnpj;
    private string $socialReason;

    /**
     * Get the value of id
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cnpj
     * 
     * @return string
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     * 
     *@param string $cnpj
     * @return  self
     */
    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of socialReason
     * 
     * @return string
     */
    public function getSocialReason(): string
    {
        return $this->socialReason;
    }

    /**
     * Set the value of socialReason
     *
     * @param string $socialReason
     * @return  self
     */
    public function setSocialReason(string $socialReason)
    {
        $this->socialReason = $socialReason;

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
        $this->setName($object['name']);
        $this->setCnpj($object['cnpj']);
        $this->setSocialreason($object['socialreason']);

        return $this;
    }
}

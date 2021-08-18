<?php

class Providers
{
    private int $id;
    private string $name;
    private string $cnpj;
    private string $socialreason;
    
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cnpj
     */ 
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @return  self
     */ 
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of socialreason
     */ 
    public function getSocialreason()
    {
        return $this->socialreason;
    }

    /**
     * Set the value of socialreason
     *
     * @return  self
     */ 
    public function setSocialreason($socialreason)
    {
        $this->socialreason = $socialreason;

        return $this;
    }

    public function setObject($object)
    {
        $this->setName($object['name']);
        $this->setCnpj($object['cnpj']);
        $this->setSocialreason($object['socialreason']);

        return $this;
    }

}

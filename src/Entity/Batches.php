<?php

class Batches
{
    private int $id;
    private string $fabricationDate;
    private string $expirationDate;
    private string $entryDate;
    private int $quantity;
    private bool $used;
    private bool $soldOff;
    private string $description;
    private int $providersId;
    private int $productsId;

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
     * Get the value of fabricationDate
     */
    public function getFabricationDate()
    {
        return $this->fabricationDate;
    }

    /**
     * Set the value of fabricationDate
     *
     * @return  self
     */
    public function setFabricationDate($fabricationDate)
    {
        $this->fabricationDate = $fabricationDate;

        return $this;
    }

    /**
     * Get the value of expirationDate
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set the value of expirationDate
     *
     * @return  self
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get the value of entryDate
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * Set the value of entryDate
     *
     * @return  self
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of used
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set the value of used
     *
     * @return  self
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get the value of soldOff
     */
    public function getSoldOff()
    {
        return $this->soldOff;
    }

    /**
     * Set the value of soldOff
     *
     * @return  self
     */
    public function setSoldOff($soldOff)
    {
        $this->soldOff = $soldOff;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of providersId
     */
    public function getProvidersId()
    {
        return $this->providersId;
    }

    /**
     * Set the value of providersId
     *
     * @return  self
     */
    public function setProvidersId($providersId)
    {
        $this->providersId = $providersId;

        return $this;
    }

    /**
     * Get the value of productsId
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set the value of productsId
     *
     * @return  self
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }
}

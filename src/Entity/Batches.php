<?php

class Batches
{
    private int $id;
    private string $fabricationDate;
    private ?string $expirationDate = "0000-00-00";
    private string $entryDate;
    private int $quantity;
    private bool $used = false;
    private bool $soldOff = false;
    private ?string $description;
    private int $providersId;
    private int $productsId;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return self
     */
    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of fabricationDate
     *
     * @return string
     */
    public function getFabricationDate(): ?string
    {
        return $this->fabricationDate;
    }

    /**
     * Set the value of fabricationDate
     *
     * @param string $fabricationDate
     * @return self
     */
    public function setFabricationDate(?string $fabricationDate)
    {
        $this->fabricationDate = $fabricationDate;

        return $this;
    }

    /**
     * Get the value of expirationDate
     *
     * @return string|null
     */
    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    /**
     * Set the value of expirationDate
     *
     * @param string|null $expirationDate
     * @return self
     */
    public function setExpirationDate(?string $expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get the value of entryDate
     *
     * @return string
     */
    public function getEntryDate(): ?string
    {
        return $this->entryDate;
    }

    /**
     * Set the value of entryDate
     *
     * @param string $entryDate
     * @return self
     */
    public function setEntryDate(?string $entryDate)
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get the value of quantity
     *
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(?int $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of used
     *
     * @return bool|null
     */
    public function getUsed(): ?bool
    {
        return $this->used;
    }

    /**
     * Set the value of used
     *
     * @param bool $used
     * @return self
     */
    public function setUsed(?bool $used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get the value of soldOff
     *
     * @return boolean
     */
    public function getSoldOff(): ?bool
    {
        return $this->soldOff;
    }

    /**
     * Set the value of soldOff
     *
     * @param boolean $soldOff
     * @return self
     */
    public function setSoldOff(?bool $soldOff)
    {
        $this->soldOff = $soldOff;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of providersId
     *
     * @return int
     */
    public function getProvidersId(): ?int
    {
        return $this->providersId;
    }

    /**
     * Set the value of providersId
     *
     * @param int $providersId
     * @return self
     */
    public function setProvidersId(?int $providersId)
    {
        $this->providersId = $providersId;

        return $this;
    }

    /**
     * Get the value of productsId
     *
     * @return int
     */
    public function getProductsId(): ?int
    {
        return $this->productsId;
    }

    /**
     * Set the value of productsId
     *
     * @param int $productsId
     * @return self
     */
    public function setProductsId(?int $productsId)
    {
        $this->productsId = $productsId;

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
        $this->setFabricationDate($object['fabricationDate']);
        $this->setEntryDate($object['entryDate']);
        $this->setQuantity($object['quantity']);
        $this->setDescription($object['description']);
        $this->setProductsId($object['product']);
        $this->setProvidersId($object['provider']);
        if ($object['expirationDate'] != "") {
            $this->setExpirationDate($object['expirationDate']);
        }

        return $this;
    }
}

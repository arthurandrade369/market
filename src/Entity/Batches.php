<?php
require_once("../Interface/InterfaceSetter.php");

class Batches implements setObject
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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of fabricationDate
     *
     * @return string|null
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
    public function setFabricationDate(string $fabricationDate): self
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
    public function setExpirationDate(?string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get the value of entryDate
     *
     * @return string|null
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
    public function setEntryDate(string $entryDate): self
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get the value of quantity
     *
     * @return int|null
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
    public function setQuantity(int $quantity): self
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
    public function setUsed(bool $used): self
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get the value of soldOff
     *
     * @return boolean|null
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
    public function setSoldOff(bool $soldOff): self
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
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of providersId
     *
     * @return int|null
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
    public function setProvidersId(int $providersId): self
    {
        $this->providersId = $providersId;

        return $this;
    }

    /**
     * Get the value of productsId
     *
     * @return int|null
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
    public function setProductsId(int $productsId): self
    {
        $this->productsId = $productsId;

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
        $this->setFabricationDate($object['fabricationDate']);
        $this->setEntryDate($object['entryDate']);
        $this->setQuantity($object['quantity']);
        if (!is_null($object['description'])) $this->setDescription($object['description']);
        $this->setProductsId($object['product']);
        $this->setProvidersId($object['provider']);
        if (!is_null($object['expirationDate']) and !empty($object['expirationDate'])) $this->setExpirationDate($object['expirationDate']);

        return $this;
    }
}

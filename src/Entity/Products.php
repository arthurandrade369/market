<?php

class Products
{
    private int $id;
    private string $name;
    private float $priceProduct;
    private int $quantityInventory;
    private ?float $discount = 0;

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
    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of priceProduct
     * 
     * @return float
     */
    public function getPriceProduct(): ?float
    {
        return $this->priceProduct;
    }

    /**
     * Set the value of priceProduct
     *
     * @param float $priceProduct
     * @return  self
     */
    public function setPriceProduct(?float $priceProduct)
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    /**
     * Get the value of quantityInventory
     * 
     * @return int
     */
    public function getQuantityInventory(): ?int
    {
        return $this->quantityInventory;
    }

    /**
     * Set the value of quantityInventory
     *
     * @param int $quantityInventory
     * @return  self
     */
    public function setQuantityInventory(?int $quantityInventory)
    {
        $this->quantityInventory = $quantityInventory;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @param float|null $discount
     * @return void
     */
    public function setDiscount(?float $discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Set the main attributes of class
     *
     * @param object|array $object
     * @return self
     */
    public function setObject($object)
    {
        $this->setName($object['name']);
        $this->setPriceProduct($object['priceproduct']);
        $this->setQuantityInventory($object['quantityinventory']);
        if (!is_null($object['discount']) and is_float($object['discount'])) $this->setDiscount($object['discount']);

        return $this;
    }
}

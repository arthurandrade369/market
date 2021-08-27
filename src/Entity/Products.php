<?php
require_once("../Interface/InterfaceSetter.php");

class Products implements setObject
{
    private int $id;
    private string $name;
    private float $priceProduct;
    private int $quantityInventory;
    private ?float $discount = 0;

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
     * Get the value of priceProduct
     * 
     * @return float|null
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
    public function setPriceProduct(float $priceProduct): self
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    /**
     * Get the value of quantityInventory
     * 
     * @return int|null
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
    public function setQuantityInventory(int $quantityInventory): self
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
    public function setDiscount(?float $discount): self
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
    public function setObject($object): self
    {
        $this->setName($object['name']);
        $this->setPriceProduct($object['priceproduct']);
        $this->setQuantityInventory($object['quantityinventory']);
        if (!is_null($object['discount']) and is_float($object['discount'])) $this->setDiscount($object['discount']);

        return $this;
    }
}

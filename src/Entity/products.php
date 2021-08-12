<?php

class Products
{
    private $id;
    private $name;
    private $price_product;
    private $quantity_inventory;
    private $discount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPrice_product(): ?float
    {
        return $this->price_product;
    }

    public function setPrice_product(float $price_product)
    {
        $this->price_product = $price_product;
    }

    public function getQuantity_inventory(): ?int
    {
        return $this->quantity_inventory;
    }

    public function setQuantity_inventory(int $quantity_inventory)
    {
        $this->quantity_inventory = $quantity_inventory;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount)
    {
        $this->discount = $discount;
    }
}

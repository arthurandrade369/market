<?php

class Sale_items
{
    private $id;
    private $quantity_sale;
    private $price_total;
    private $products_id;
    private $buy_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getQuantity_sale(): ?int
    {
        return $this->quantity_sale;
    }

    public function setQuantity_sale(int $quantity_sale)
    {
        $this->quantity_sale = $quantity_sale;
    }

    public function getPrice_total(): ?float
    {
        return $this->price_total;
    }

    public function setPrice_total(float $price_total)
    {
        $this->price_total = $price_total;
    }

    public function getProducts_id(): ?int
    {
        return $this->products_id;
    }

    public function setProducts_id(int $products_id)
    {
        $this->products_id = $products_id;
    }

    public function getBuy_id(): ?int
    {
        return $this->buy_id;
    }

    public function setBuy_id(int $buy_id)
    {
        $this->buy_id = $buy_id;
    }
}

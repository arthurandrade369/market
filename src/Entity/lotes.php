<?php

class Lotes
{
    private $id;
    private $fabrication_date;
    private $expiration_date;
    private $entry_date;
    private $quantity;
    private $used;
    private $sold_off;
    private $description;
    private $providers_id;
    private $products_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setid(int $id)
    {
        $this->id = $id;
    }

    public function getFabrication_date(): ?string
    {
        return $this->fabrication_date;
    }

    public function setFabrication_date(string $fabrication_date)
    {
        $this->fabrication_date = $fabrication_date;
    }

    public function getExpiration_date(): ?string
    {
        return $this->expiration_date;
    }

    public function setExpiration_date(string $expiration_date)
    {
        $this->expiration_date = $expiration_date;
    }

    public function getEntry_date(): ?string
    {
        return $this->entry_date;
    }

    public function setEntry_date(string $entry_date)
    {
        $this->entry_date = $entry_date;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getUsed(): ?bool
    {
        return $this->used;
    }

    public function setUsed(bool $used)
    {
        $this->used = $used;
    }

    public function getSold_off(): ?bool
    {
        return $this->sold_off;
    }

    public function setSold_off(bool $sold_off)
    {
        $this->sold_off = $sold_off;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getProviders_id(): ?int
    {
        return $this->providers_id;
    }

    public function setProviders_id(int $providers_id)
    {
        $this->providers_id = $providers_id;
    }

    public function getProducts_id(): ?int
    {
        return $this->products_id;
    }

    public function setProducts_id(int $products_id)
    {
        $this->products_id = $products_id;
    }
}

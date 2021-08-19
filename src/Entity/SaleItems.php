<?php

class Sale_items
{
    private int $id;
    private int $quantitySale;
    private float $priceTotal;
    private int $productsId;
    private int $buyId;

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
     * Get the value of quantitySale
     * 
     * @return int
     */
    public function getQuantitySale(): int
    {
        return $this->quantitySale;
    }

    /**
     * Set the value of quantitySale
     *
     * @param int $quantitySale
     * @return  self
     */
    public function setQuantitySale(int $quantitySale)
    {
        $this->quantitySale = $quantitySale;

        return $this;
    }

    /**
     * Get the value of priceTotal
     * 
     * @return float
     */
    public function getPriceTotal(): float
    {
        return $this->priceTotal;
    }

    /**
     * Set the value of priceTotal
     *
     * @param float $priceTotal
     * @return  self
     */
    public function setPriceTotal(float $priceTotal)
    {
        $this->priceTotal = $priceTotal;

        return $this;
    }

    /**
     * Get the value of productsId
     * 
     * @return int
     */
    public function getProductsId(): int
    {
        return $this->productsId;
    }

    /**
     * Set the value of productsId
     *
     * @param int $productsId
     * @return  self
     */
    public function setProductsId(int $productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get the value of buyId
     * 
     * @return int
     */
    public function getBuyId(): int
    {
        return $this->buyId;
    }

    /**
     * Set the value of buyId
     *
     * @param int $buyId
     * @return  self
     */
    public function setBuyId(int $buyId)
    {
        $this->buyId = $buyId;

        return $this;
    }
}

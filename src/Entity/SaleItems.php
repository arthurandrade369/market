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
     * Get the value of quantitySale
     */
    public function getQuantitySale()
    {
        return $this->quantitySale;
    }

    /**
     * Set the value of quantitySale
     *
     * @return  self
     */
    public function setQuantitySale($quantitySale)
    {
        $this->quantitySale = $quantitySale;

        return $this;
    }

    /**
     * Get the value of priceTotal
     */
    public function getPriceTotal()
    {
        return $this->priceTotal;
    }

    /**
     * Set the value of priceTotal
     *
     * @return  self
     */
    public function setPriceTotal($priceTotal)
    {
        $this->priceTotal = $priceTotal;

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

    /**
     * Get the value of buyId
     */
    public function getBuyId()
    {
        return $this->buyId;
    }

    /**
     * Set the value of buyId
     *
     * @return  self
     */
    public function setBuyId($buyId)
    {
        $this->buyId = $buyId;

        return $this;
    }
}

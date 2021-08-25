<?php

class SaleItems
{
    private int $id;
    private int $quantitySale;
    private float $priceTotal;
    private int $productsId;
    private int $saleId;

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
     * Get the value of quantitySale
     * 
     * @return int|null
     */
    public function getQuantitySale(): ?int
    {
        return $this->quantitySale;
    }

    /**
     * Set the value of quantitySale
     *
     * @param int $quantitySale
     * @return  self
     */
    public function setQuantitySale(int $quantitySale): self
    {
        $this->quantitySale = $quantitySale;

        return $this;
    }

    /**
     * Get the value of priceTotal
     * 
     * @return float|null
     */
    public function getPriceTotal(): ?float
    {
        return $this->priceTotal;
    }

    /**
     * Set the value of priceTotal
     *
     * @param float $priceTotal
     * @return  self
     */
    public function setPriceTotal(float $priceTotal): self
    {
        $this->priceTotal = $priceTotal;

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
     * @return  self
     */
    public function setProductsId(int $productsId): self
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get the value of saleId
     * 
     * @return int|null
     */
    public function getSaleId(): ?int
    {
        return $this->saleId;
    }

    /**
     * Set the value of saleId
     *
     * @param int $saleId
     * @return  self
     */
    public function setSaleId(int $saleId): self
    {
        $this->saleId = $saleId;

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
        $this->setQuantitySale($object['quantity_sale']);
        $this->setPriceTotal($object['price_total']);
        $this->setProductsId($object['product_id']);
        $this->setSaleId($object['sale_id']);

        return $this;
    }
}

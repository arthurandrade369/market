<?php

class Products
{
    private int $id;
    private string $name;
    private float $priceProduct;
    private int $quantityInventory;
    private float $discount;

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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of priceProduct
     */
    public function getPriceProduct()
    {
        return $this->priceProduct;
    }

    /**
     * Set the value of priceProduct
     *
     * @return  self
     */
    public function setPriceProduct($priceProduct)
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    /**
     * Get the value of quantityInventory
     */
    public function getQuantityInventory()
    {
        return $this->quantityInventory;
    }

    /**
     * Set the value of quantityInventory
     *
     * @return  self
     */
    public function setQuantityInventory($quantityInventory)
    {
        $this->quantityInventory = $quantityInventory;

        return $this;
    }

    /**
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    public function setObject($object)
    {
        $this->setName($object['name']);
        $this->setPriceProduct($object['priceproduct']);
        $this->setQuantityInventory($object['quantityinventory']);
        if (is_numeric($object['discount'])) {
            $this->setDiscount($object['discount']);
        }
    }
}

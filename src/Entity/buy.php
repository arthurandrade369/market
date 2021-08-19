<?php

class Buy
{
    private int $id;
    private string $date;
    private string $state;
    private bool $wasPaid;
    private string $paymentMethod;
    private float $finalPrice;
    private float $discount;
    private float $shipping;

    

    /**
     * Get the value of id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param integer $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param string $date
     * @return self
     */
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     * @return self
     */
    public function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of wasPaid
     * 
     * @return string
     */ 
    public function getWasPaid(): bool
    {
        return $this->wasPaid;
    }

    /**
     * Set the value of wasPaid
     *
     * @param boolean $wasPaid
     * @return  self
     */ 
    public function setWasPaid(bool $wasPaid)
    {
        $this->wasPaid = $wasPaid;

        return $this;
    }

    /**
     * Get the value of paymentMethod
     * 
     * @return string
     */ 
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * Set the value of paymentMethod
     *
     * @param string $paymentMethod
     * @return  self
     */ 
    public function setPaymentMethod(string $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get the value of finalPrice
     * 
     * @return float
     */ 
    public function getFinalPrice(): float
    {
        return $this->finalPrice;
    }

    /**
     * Set the value of finalPrice
     *
     * @param float $name
     * @return  self
     */ 
    public function setFinalPrice($finalPrice)
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    /**
     * Get the value of discount
     * 
     * @return float
     */ 
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @param float $discount
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of shipping
     * 
     * @return float
     */ 
    public function getShipping(): float
    {
        return $this->shipping;
    }

    /**
     * Set the value of shipping
     *
     * @param float $shipping
     * @return  self
     */ 
    public function setShipping(float $shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }
}

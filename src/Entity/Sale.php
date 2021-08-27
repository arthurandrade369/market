<?php
require_once("../Interface/InterfaceSetter.php");

class Sale implements setObject
{
    private int $id;
    private string $date;
    private string $state = "Pendente";
    private bool $wasPaid = false;
    private string $paymentMethod;
    private float $finalPrice;
    private ?float $discount = 0;
    private float $shipping;

    public function __construct()
    {
        $this->setDate(date('Y-m-d H:i:s'));
    }

    /**
     * Get the value of id
     *
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of date
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param string $date
     * @return self
     */
    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of wasPaid
     * 
     * @return string|null
     */
    public function getWasPaid(): ?bool
    {
        return $this->wasPaid;
    }

    /**
     * Set the value of wasPaid
     *
     * @param boolean $wasPaid
     * @return  self
     */
    public function setWasPaid(bool $wasPaid): self
    {
        $this->wasPaid = $wasPaid;

        return $this;
    }

    /**
     * Get the value of paymentMethod
     * 
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * Set the value of paymentMethod
     *
     * @param string $paymentMethod
     * @return  self
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get the value of finalPrice
     * 
     * @return float|null
     */
    public function getFinalPrice(): ?float
    {
        return $this->finalPrice;
    }

    /**
     * Set the value of finalPrice
     *
     * @param float $name
     * @return  self
     */
    public function setFinalPrice(float $finalPrice): self
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    /**
     * Get the value of discount
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
     * @return  self
     */
    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of shipping
     * 
     * @return float|null
     */
    public function getShipping(): ?float
    {
        return $this->shipping;
    }

    /**
     * Set the value of shipping
     *
     * @param float $shipping
     * @return  self
     */
    public function setShipping(float $shipping): self
    {
        $this->shipping = $shipping;

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
        $this->setState($object['state']);
        $this->setPaymentMethod($object['payment_method']);
        $this->setFinalPrice($object['final_price']);
        if (!is_null($object['discount'])) $this->setDiscount(floatval($object['discount']));
        $this->setShipping($object['shipping']);
        if (isset($object['was_paid'])) $this->setWasPaid($object['was_paid']);

        return $this;
    }
}

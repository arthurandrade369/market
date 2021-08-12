<?php

class Buy
{
    private $id;
    private $date;
    private $state;
    private $was_paid;
    private $payment_method;
    private $final_price;
    private $discount;
    private $shipping;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getWas_paid(): ?bool
    {
        return $this->was_paid;
    }

    public function setWas_paid(bool $was_paid)
    {
        $this->was_paid = $was_paid;
    }

    public function getPayment_method(): ?string
    {
        return $this->payment_method;
    }

    public function setPayment_method(string $payment_method)
    {
        $this->payment_method = $payment_method;
    }

    public function getFinal_price(): ?float
    {
        return $this->final_price;
    }

    public function setFinal_price(float $final_price)
    {
        $this->final_price = $final_price;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount)
    {
        $this->discount = $discount;
    }

    public function getShipping(): ?float
    {
        return $this->shipping;
    }

    public function setShipping(float $shipping)
    {
        $this->shipping = $shipping;
    }
}

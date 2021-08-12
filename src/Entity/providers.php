<?php

class Providers
{
    private $id;
    private $name;
    private $cnpj;

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

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setObject($object)
    {
        $this->setId($object['id']);
        $this->setName($object['name']);
        $this->setCnpj($object['cnpj']);

        return $this;
    }
}

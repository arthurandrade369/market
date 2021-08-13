<?php

class Clients
{
    private int $id;
    private string $name;
    private string $email;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setObject($object)
    {
        $this->setName($object['name']);
        $this->setEmail($object['email']);

        return $this;
    }
}

<?php

class Clients
{
    private int $id;
    private string $name;
    private string $email;

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
     * Get the value of name
     * 
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     * 
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     * 
     *@param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
        $this->setName($object['name']);
        $this->setEmail($object['email']);

        return $this;
    }
}

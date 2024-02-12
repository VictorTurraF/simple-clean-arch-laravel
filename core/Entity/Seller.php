<?php

namespace Core\Entity;

class Seller {

    public function __construct(
        private string $name,
        private string $email,
        private string|null $id = null
    ) {}

    public function updateId($newId)
    {
        $this->id = $newId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}

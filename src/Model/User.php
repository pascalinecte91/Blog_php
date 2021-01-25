<?php

namespace App\Model;

class User
{
    private $id;

    private $username;


    private $password;

    private $is_admin;



    public function getUsername(): ?string
    {
        return $this->username;
    }


    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }



    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return !! $this->is_admin;
    }


    public function setIsAdmin(bool $is_admin)
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}

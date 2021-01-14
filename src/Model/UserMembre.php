<?php

namespace App\Model;

class UserMembre
{
    private $id;

    private $username_member;


    private $password;



    public function getUserMembre(): ?string
    {
        return $this->username_member;
    }


    public function setUserMembre(string $username_member): self
    {
        $this->username_member = $username_member;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;


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
}

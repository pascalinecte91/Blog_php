<?php

namespace App\Model;

class UserMembre
{
    private $id;

    private $user_membre;


    private $password;



    public function getUserMembre(): ?string
    {
        return $this->user_membre;
    }


    public function setUserMembre(string $user_membre): self
    {
        $this->user_membre = $user_membre;

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

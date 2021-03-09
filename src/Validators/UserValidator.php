<?php

namespace App\Validators;

use App\Model\UserManager;


class UserValidator 
{
    public function __construct(array $data, $username, $password, UserManager $manager) 
    {
       
        $this->username = $username;
        $this->password = $password;
       
    }
}
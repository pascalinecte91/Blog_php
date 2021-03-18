<?php

namespace App\Model\Exception;

class NotFoundException extends \Exception
{
    
    public function __construct(string $manager, $id)
   
    {
        $this->message = "Aucun enregistrement ne correspond à l'id #$id dans la table '$manager'";
    }
}
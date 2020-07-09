<?php
namespace App\Table\Exception;

class NotFoundException extends \Exception {

        public function __construction(string $table, $id)
        {
                $this->message ="Auncun enregistrement ne correspond à l'id #$id dans la table '$table'";
        }
}
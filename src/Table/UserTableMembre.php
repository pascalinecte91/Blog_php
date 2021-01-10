<?php

namespace App\Table;

use App\Model\UserMembre;
use App\Table\Exception\NotFoundException;

final class UserTableMembre extends Table
{
    protected $table = "user_membre";
    protected $class = UserMembre::class;

    public function findByUsernameMembre(string $usernamemembre)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE username_membre = :username_membre');
        $query->execute(['username_membre' => $usernamemembre]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException($this->table, $usernamemembre);
        }
        return $result;
    }
}

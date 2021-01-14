<?php

namespace App\Table;

use App\Model\UserMembre;
use App\Table\Exception\NotFoundException;

final class UserTableMembre extends Table
{
    protected $table = "user_member";
    protected $class = UserMembre::class;

    public function findByUserMembre(string $username_member)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE username_member = :username_member');
        $query->execute(['username_member' => $username_member]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        
        if ($result === false) {
            throw new NotFoundException($this->table, $username_member);
        }
        return $result;
        
    }
}

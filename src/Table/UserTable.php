<?php

namespace App\Table;

use App\Model\User;
use App\Table\Exception\NotFoundException;
use \PDO;

final class UserTable extends Table
{
    protected $table = "user";
    protected $class = User::class;

public function findByUsername(string $username)
{
    $query = $this->pdo->prepare("SELECT id FROM user WHERE username = ?");
    $query->execute([$_POST['username']]);
    $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
    $result = $query->fetch();

    if ($result === true) {
        echo 'l \  okkk';
    } else {
        echo 'pseudo deja utilisé ';
    }
    return $result;
}


public function createUser(User $user)
    {
        $id = $this->create([
    'username' => $user->getUsername(),
    'password' => $user->getPassword(),
    'is_admin' => 0,]);
        $user->setId($id);
        if ($user) {
            $errors['username']= 'psuedo exist';
 

    }
}

    public function addUser($username,$password)
    {
        $query = $this->pdo->prepare("INSERT INTO user SET  username = ?, password = ?");
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query->execute([$_POST['password'], $password]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === true) {
            echo 'l \utilisateur est  enregistré';
        } else {
            echo 'merci de recommencer votre enregistrement ';
        }
        return $result;
    }

}


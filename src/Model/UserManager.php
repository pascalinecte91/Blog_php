<?php

namespace App\Model;

use App\Model\User;
use \PDO;

final class UserManager extends Manager
{
    protected $manager = "user";
    protected $class = User::class;

    public function findByUsername(string $username)
    {
        $query = $this->pdo->prepare("SELECT id FROM user WHERE username = ?");
        $query->execute([$_POST['username']]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $user = $query->fetch();
        if ($user) {
            $errors['username']= 'psuedo deja utilisé';
        }
    }



    public function createUser(User $user)
    {
        $id = $this->create([
    'username' => $user->getUsername(),
    'password' => $user->getPassword(),
    'is_admin' => 0,]);
        $user->setId($id);
        return $user;
    }

    public function hydrateUsers(array $users)
    {
        foreach ($users as $user) {
            $user->setUser([]);
        }
        $users = $this->pdo
      ->query('SELECT *
                  FROM user
                  WHERE id IN (' . implode(array_keys($users)) . ')')
      ->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function addUser($username, $password)
    {
        $query = $this->pdo->prepare("INSERT INTO user SET  username = ?, password = ?");
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query->execute([$username,$password]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === true) {
            echo ' bon';
        } else {
            echo ' good ';
        }

        return $result;
    }
}
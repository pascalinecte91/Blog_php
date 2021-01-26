<?php

use App\Table\UserTable;
use App\Table\Exception\NotFoundException;
use App\ObjectHelper;
use App\Model\User;
use App\Connection;


$user = new User();
$pdo = Connection::getPDO();
$errors = array();



    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password']= "Votre mot de passe ne correspond pas";

    }
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());
    }
    if (empty($errors)){

        $query =$pdo->prepare("INSERT INTO user SET username = ?, password = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query->execute([$_POST['username'], $password]);
        die('Compte enregistré');

    } else {
        $query = $pdo->prepare("SELECT id FROM user WHERE username = ?");
        
        $query->execute($_POST['username']);
        $user = $query->fetch();

    }
    if ($user) {
        $errors['username']= "Merci de choisir un autre pseudo, celui-ci existe déjà !";
    }



        try {
             ObjectHelper::hydrate($user, $_POST, ['username', 'password']);
            $user = $table->createUser($user);
                session_start();
                $_SESSION['auth'] = $user->getId();
                header('Location: ' . $router->url('blog'));
                exit();

        } catch (NotFoundException $e) {
        }
    




require_once('../views/auth/login_register.php');

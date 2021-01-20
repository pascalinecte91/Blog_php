<?php

use App\Connection;
use App\Model\User;
use App\Table\Exception\NotFoundException;
use App\Table\UserTable;


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

        try {
            $user = $table->createUser($_POST(['username', 'password']));
            if (password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth'] = $u->getId();
                header('Location: ' . $router->url('blog'));
                exit();
            }
        } catch (NotFoundException $e) {
        }
    }




require_once('../views/auth/login_register.php');

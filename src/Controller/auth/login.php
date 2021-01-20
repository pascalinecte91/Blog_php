<?php

use App\Model\User;

use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$user = new User();
$errors = [];



    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    }
    if (empty($_POST['password']) || !empty ($_POST['password_confirm'])) {
        $errors['password']= "Votre mot de passe ne correspond pas";
    }

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());


    try {
        $u = $table->findByUsername($_POST['username']);
        if (password_verify($_POST['password'], $u->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $u->getId();
        }
            if ($u->getIsAdmin()) {
                header('Location: ' . $router->url('admin_posts'));
                exit();
        }
            else {
                header('Location: ' . $router->url('blog'));
                exit();
            }
    } catch (NotFoundException $e) {
    }
}

require_once('../views/auth/login.php');

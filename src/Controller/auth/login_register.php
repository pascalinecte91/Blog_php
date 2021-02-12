<?php

use App\Table\UserTable;
use App\Table\Exception\NotFoundException;
use App\Model\User;
use App\Connection;

$table = new UserTable(Connection::getPDO());
$pdo = Connection::getPDO();
$user = new User();
$users = new User();

if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    }
    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }
    if (isset($user)) {
        $errors['username'] = 'Pseudo déjà pris';
    }

    if (empty($errors)) {
        die('Compte enregistré');
        $_SESSION['auth'] = $user;
        header('Location: ' . $router->url('blog'));
        exit();
    }
}
require_once('../views/auth/login_register.php');

<?php

use App\Model\User;
use App\Connection;
use App\Model\UserManager;
use App\Model\Exception\NotFoundException;

$pdo = Connection:: getPDO();
$user = new User();
$UserManager = new UserManager($pdo);


if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['password'])) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }

    if (empty($_POST['username'])) {
        $errors['username']= " votre pseudo n'est pas correct ";
    }
    if (empty($errors)) {
        $user->getUsername();
        $user->getPassword();
        $_SESSION['auth'] = $user;
        header('Location: ' . $router->url('blog'));
        exit();
    }
}

require_once('../views/auth/login_member.php');

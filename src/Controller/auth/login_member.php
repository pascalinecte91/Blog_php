<?php

use App\Model\User;
use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$table = new UserTable(Connection::getPDO());
$user = new User();
$pdo = Connection:: getPDO();
$errors = array();

    if (empty($_POST['password'])) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }
  
    if (empty($_POST['username'])) {
        $errors['username']= " votre pseudo n'est pas correct ";
    }

    if (!isset($_POST['envoyer'])) {
        echo ' votre formualire  n\est pas envoyé';
    }

    try {
        $_SESSION['auth'] = $user->getId();
        header('Location: ' . $router->url('blog'));
        exit();
        
    } catch (NotFoundException $e) {
    }


require_once('../views/auth/login_member.php');

<?php

use App\Table\UserTable;
use App\Table\Exception\NotFoundException;
use App\ObjectHelper;
use App\Model\User;
use App\Connection;


$user = new User();
$pdo = Connection::getPDO();

//si la variable post n'est pas vide c'est que lesdonnees  ont bien ete postées

if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    } else {
        $query = $pdo->prepare("SELECT id FROM user WHERE username = ?");
        $query->execute([$_POST['username']]);
        $u = $query->fetch();
    if($u){
        $errors['username'] = 'Pseudo déjà pris';
    }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }

    if (empty($errors)) {
        $query =$pdo->prepare("INSERT INTO user SET username = ?, password = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query->execute([$_POST['username'], $password]);
        die('Compte enregistré');

    }
}





require_once('../views/auth/login_register.php');

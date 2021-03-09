<?php

use App\Model\UserManager;
use App\Model\User;
use App\Connexion;
use App\Validators\UserValidator;
use App\ObjectHelper;

$pdo = Connexion::getPDO();
$user = new User();
$userManager = new UserManager($pdo);

$errors = array();



if (!empty($_POST)) {
    extract($_POST);
    $valid = true;



    if (!empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    }

    if (!isset($_POST['username'])) {
        $errors['username']= "Ce pseudo existe déjà  ou est vide merci d'en choisir un autre";
    }

    if (!empty($_POST['password'])  != $_POST['password_confirm']) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }
       

    if (!empty($_POST)) {
        $data = array_merge($_POST, $_FILES);
        ObjectHelper::hydrate($user, $data, ['username', 'password']);
        $userManager->createUser($user);
        $success = true;
    }


    $_SESSION['auth'] = $user;
    $_SESSION['message_section'] = 'register';


    header('Location: ' . $router->url('blog'));
    exit();
}

require_once('../views/auth/login_register.php');

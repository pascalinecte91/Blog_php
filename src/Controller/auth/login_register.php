<?php
session_start();

use App\Model\UserManager;
use App\Model\User;
use App\Connection;

$pdo = Connection::getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$errors = array();






       if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
           $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
       }
    
       if (empty($_POST['username'])) {
           $errors['username']= "Ce pseudo existe déjà  ou est vide merci d'en choisir un autre";
       }


       if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
           $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
       }
       if (empty($errors)) {
           $user->setUsername($_POST['username']);
           $user->setPassword($_POST['password']);
           $userManager->createUser($user);
           $success = true;

           //  je comprends pas  pk ca marcherait pas  avec $user = userManager->createUser($user);


           $_SESSION['auth'] = $user;
           header('Location: ' . $router->url('blog'));
           exit();
       }
   

require_once('../views/auth/login_register.php');
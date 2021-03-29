<?php

use App\Model\User;
use App\Connexion;
use App\Model\UserManager;

$pdo = Connexion::getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$errors =[];

if (!empty($_POST)) {
    $errors = array();
    $user = $userManager->findByUsernameAndPassword($_POST['username'], $_POST['password']);
    
     if(empty($_POST['password'])) {
       $errors['password'] = "rentrez votre mot de passe!";
     }

     if ($user== null) {
      $errors['password'] = "login  mot passe incorrect!";
     }

     if (empty($errors)) {
         if ($user->getIsAdmin()) {
             $_SESSION['auth'] = $user;
             $_SESSION['message_section'] = 'administrator';
    
             header('Location: ' . $router->url('admin_posts'));
             exit();
         } else {
             $errors ['username'] =  'Vous n\'êtes pas  Administrateur!';
         }
     }
  
  }
  $_SESSION ['errors'] = serialize($errors);

require_once('../views/auth/login_admin.php');

<?php

use App\Model\UserManager;
use App\Model\User;
use App\Connexion;
use App\ObjectHelper;

$pdo = Connexion::getPDO();
$user = new User();
$userManager = new UserManager($pdo);
  
if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['password']) || ($_POST['password'] != $_POST['password_confirm'])) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    }
    if (isset($_POST['username'])) {
        $userExist = (new UserManager($pdo))->findByUsername($_POST['username']);

        if (false !== $userExist) {
            $errors['username']= sprintf('Le PSEUDO %s existe deja, merci d\'en choisir un autre', $_POST['username']);
        }
    }

    if (count($errors) == 0) {
        $data = array_merge($_POST, $_FILES);
        ObjectHelper::hydrate($user, $data, ['username', 'password']);
        $userManager->createUser($user);
        $success = true;

        $_SESSION['auth'] = $user;
        $_SESSION['message_section'] = 'register';

        header('Location: ' . $router->url('blog'));
        exit();
    } else {
        header('Location: ' . $router->url('login_register'));
        $_SESSION['errors'] = serialize($errors);
        exit();
    }
}
require_once('../views/auth/login_register.php');


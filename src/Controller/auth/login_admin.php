<?php

use App\Model\User;
use App\Connexion;
use App\Model\UserManager;

$pdo = Connexion::getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$errors = array();

if (!empty($_POST)) {
    $user = $userManager->findByUsernameAndPassword($_POST['username'], $_POST['password']);
}
    if ($user->getIsAdmin()) {
        $_SESSION['auth'] = $user;
        $_SESSION['message_section'] = 'administrator';

        header('Location: ' . $router->url('admin_posts'));
        exit();
    } else {
        $errors ['username'] =  'Vous n\'êtes pas  Administrateur!';
    }
 

require_once('../views/auth/login_admin.php');

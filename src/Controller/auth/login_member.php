<?php

use App\Model\User;
use App\Connexion;
use App\Model\UserManager;

$pdo = Connexion:: getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$error = array();

if (!empty($_POST)) {
    $user = $userManager->findByUsernameAndPassword($_POST['username'], $_POST['password']);
    if (!empty($user)) {
        $_SESSION['auth'] = $user;
        $_SESSION['message_section'] = 'connexion';

        header('Location: ' . $router->url('blog'));
        exit();
    } else {
        $error ['password'] =  'Merci de rentrer un mot de passe correct!';
    }
}
require_once('../views/auth/login_member.php');


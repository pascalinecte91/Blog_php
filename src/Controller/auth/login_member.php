<?php
session_start();

use App\Model\User;
use App\Connection;
use App\Model\UserManager;

$pdo = Connection:: getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$errors = array();


if (!empty($_POST)) {
    $user = $userManager->findByUsernameAndPassword($_POST['username'], $_POST['password'] );
    if (!empty($user)) {
      
        $_SESSION['auth'] = $user;
        header('Location: ' . $router->url('blog'));
        exit();

    } else {
        $errors ['password'] =  'Merci de rentrer un mot de passe correct!';
    }
 
}
require_once('../views/auth/login_member.php');

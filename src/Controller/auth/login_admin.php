<?php
session_start();
use App\Model\User;
use App\Connection;
use App\Model\UserManager;

$pdo = Connection::getPDO();
$user = new User();
$userManager = new UserManager($pdo);
$errors = array();
$success= false;

if (!empty($_POST)) { 
    $user = $userManager->findByUsernameAndPassword($_POST['username'], $_POST['password']); 

    if ($user->getIsAdmin()) {
        $_SESSION['auth'] = $user;

        header('Location: ' . $router->url('admin_posts'));
        exit();
    } else {   
        $errors ['username'] =  'Vous n\'êtes pas  Administrateur!';
    }
 

    
    
}

require_once('../views/auth/login_admin.php');
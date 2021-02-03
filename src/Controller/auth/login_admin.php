<?php

use App\Model\User;

use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$user = new User();
$table = new UserTable(Connection::getPDO());
$pdo = Connection::getPDO();


if (empty($_POST['password'])) {
        $errors['password']= "Votre mot de passe ne correspond pas ou n'est pas rempli correctement!";
    } else {


    try {
        $user = $table->findByUsername($_POST['username']);
        if (password_verify($_POST['password'], $user->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['succes'] =  'vous etes connectes';
        }
        if ($user->getIsAdmin()) {
            header('Location: ' . $router->url('admin_posts'));
            exit();
        } else {
            header('Location: ' . $router->url('blog'));
            exit();

        }
    } catch (NotFoundException $e) {
    }
}


require_once('../views/auth/login_admin.php');

<?php


use App\Connection;
use App\Model\UserMembre;
use App\Table\Exception\NotFoundException;
use App\Table\UserTableMembre;

$user_member = new UserMembre();
$errors = [];
$link = $router->url('login_index');

if (isset($_POST ['username_member'])) {
    $userMembre->setUserMembre($_POST['username_member']);
    $errors['password'] = 'identifiant ou mot de passe incorrect';
}
if (!empty($_POST['username_member']) && !empty($_POST['password'])) {
    $table = new UserTableMembre(Connection::getPDO());

    try {
        $um = $table->findByUserMembre($_POST['username_member']);
        if (password_verify($_POST['password'], $um->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $um->getId();
            header('Location: ' . $router->url('blog'));
            exit();
        }
    } catch (NotFoundException $e) {
    }
}
require_once('../views/auth/login_index.php');
<?php


use App\Connection;
use App\Model\UserMembre;
use App\Table\Exception\NotFoundException;
use App\Table\UserTableMembre;

$userMembre = new UserMembre();
$errors = [];

if (isset($_POST ['user_membre'])) {
    $userMembre->setUserMembre($_POST['user_membre']);
    $errors['password'] = 'identifiant ou mot de passe incorrect';
}
if (!empty($_POST['user_membre']) && !empty($_POST['password'])) {
    $table = new UserTableMembre(Connection::getPDO());

    try {
        $um = $table->findByUserMembre($_POST['user_member']);
        if (password_verify($_POST['password'], $um->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $um->getId();
            header('Location: ' . $router->url('home'));
            exit();
        }
    } catch (NotFoundException $e) {
    }
}
require_once('../views/auth/index.php');
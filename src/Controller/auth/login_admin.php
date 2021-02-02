<?php

use App\Model\User;

use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$user = new User();
$table = new UserTable(Connection::getPDO());
$pdo = Connection::getPDO();

if (!empty($_POST)) {
    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username']= "Votre pseudo ne correspond pas aux caractères valides";
    }
    
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());
    }
    if (empty($errors)) {
        $query =$pdo->prepare("INSERT INTO user SET username = ?, password = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query->execute([$_POST['username'], $password]);
        die('Compte admin enregistré');
    } else {
        $query = $pdo->prepare("SELECT id FROM user WHERE username = ?");
        $query->execute([$_POST['username']]);
        $user = $query->fetch();
        $user = $errors['username']= " Merci de choisir un autre pseudo ADMINISTRATEUR, celui-ci existe deja!";

    }



    try {
        $user = $table->findByUsername($_POST['username']);
        if (password_verify($_POST['password'], $user->getPassword()) === true) {
            session_start();
            $_SESSION['auth'] = $user->getId();
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

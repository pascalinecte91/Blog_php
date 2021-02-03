<?php

use App\Model\User;
use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$user = new User();
$table = new UserTable(Connection::getPDO());
$pdo = Connection::getPDO();

    if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $query = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $query->execute(['username' =>$_POST['username']]);
        $u = $query->fetch();

        if (password_verify($_POST['password'], $u->password)) {
            $_SESSION['auth'] = $u;
            header('Location: ' . $router->url('blog'));
            exit();
        }
}


require_once('../views/auth/login_member.php');

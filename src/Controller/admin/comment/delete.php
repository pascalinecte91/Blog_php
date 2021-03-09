<?php

use App\Connexion;
use App\Model\CommentManager;
use App\Auth;

Auth::check();

$pdo = Connexion::getPDO();
$manager = new CommentManager($pdo);
$manager->delete($params['id']);
header('Location:' . $router->url('admin_comments') . '?delete=1');
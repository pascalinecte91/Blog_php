<?php

use App\Connexion;
use App\Model\PostManager;
use App\Auth;

Auth::check();

$pdo = Connexion::getPDO();
$manager = new PostManager($pdo);
$manager->delete($params['id']);
header('Location:' . $router->url('admin_posts') . '?delete=1');
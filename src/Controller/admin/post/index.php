<?php

use App\Connexion;
use App\Model\PostManager;
use App\Auth;

Auth::check();
$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connexion::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostManager($pdo))->findPaginated();
$success = true;
$errors = [];
$_SESSION['errors'] = serialize($errors);


require_once('../views/admin/post/index.php');
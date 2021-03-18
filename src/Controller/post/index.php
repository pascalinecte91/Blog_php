<?php

use App\Connexion;
use App\Model\PostManager;

if (empty($_SESSION['auth'])) {
    header('Location: ' . $router->url('login_member'));  
}

$title = 'Mon blog';
$pdo = Connexion::getPDO();
$manager = new PostManager($pdo);
[$posts, $pagination] = $manager->findPaginated();
$post = [];
$errors = [];
$link =  $router->url('blog');
require_once('../views/post/index.php');
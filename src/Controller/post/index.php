<?php

use App\Connection;
use App\Model\PostManager;

$title = 'Mon blog';
$pdo = Connection::getPDO();

$manager = new PostManager($pdo);
[$posts, $pagination] = $manager->findPaginated();
$post = [];
$errors = [];
$errorsR = [];
$success = true;
$successR = true;
$link =  $router->url('blog');
require_once('../views/post/index.php');
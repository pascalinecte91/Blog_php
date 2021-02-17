<?php

use App\Connection;
use App\Model\PostManager;

$title = 'Mon blog';
$pdo = Connection::getPDO();

$table = new PostManager($pdo);
[$posts, $pagination] = $table->findPaginated();
$post = [];


$link =  $router->url('blog');
require_once('../views/post/index.php');

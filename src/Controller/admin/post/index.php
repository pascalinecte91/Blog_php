<?php
use App\Connection;
use App\Table\PostTable;
use App\Table\CommentTable;
use App\Auth;

Auth::check();

$router->layout ="admin/layouts/default";
$title= "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');

[$posts, $pagination] = (new PostTable($pdo))->findPaginated();






require_once ('../views/admin/post/index.php');


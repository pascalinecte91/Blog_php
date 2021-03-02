<?php

use App\Connection;
use App\Model\CommentManager;
use App\Auth;

Auth::check();

$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_comments');
[$comments, $pagination] = (new CommentManager($pdo))->findPaginated();


require_once('../views/admin/post/index.php');

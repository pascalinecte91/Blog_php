<?php

use App\Connection;
use App\Model\PostManager;
use App\Auth;

Auth::check();

$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostManager($pdo))->findPaginated();
$success = true;

require_once('../views/admin/post/index.php');
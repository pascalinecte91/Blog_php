<?php

use App\Connection;
use App\Model\CommentManager;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$manager = new CommentManager($pdo);
$manager->delete($params['id']);
header('Location:' . $router->url('admin_comments') . '?delete=1');
<?php

use App\Connection;
use App\Model\PostManager;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$manager = new PostManager($pdo);
$manager->delete($params['id']);
header('Location:' . $router->url('admin_posts') . '?delete=1');
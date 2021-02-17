<?php

use App\Connection;
use App\Table\CommentManager;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CommentManager($pdo);
$table->delete($params['id']);
header('Location:' . $router->url('admin_comments') . '?delete=1');

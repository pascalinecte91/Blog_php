<?php

use App\Connection;
use App\Table\CommentManager;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CommentManager($pdo);
$comment = $table->findById($params['id']);
$table->approve($comment);
header('Location:' . $router->url('admin_posts') . '?approve=1');

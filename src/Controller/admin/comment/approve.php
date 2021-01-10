<?php

use App\Connection;
use App\Table\CommentTable;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CommentTable($pdo);
$comment = $table->findById($params['id']);
$table->approve($comment);
header('Location:' . $router->url('admin_comments') . '?approve=1');

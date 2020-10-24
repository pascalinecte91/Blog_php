<?php
use App\Connection;
use App\Table\CommentTable;
use App\Auth;

Auth::check();

$pdo = Connection ::getPDO();
$table = new CommentTable($pdo);
$table->delete($params['id']);
header('Location:' . $router->url('admin_comments') . '?delete=1');





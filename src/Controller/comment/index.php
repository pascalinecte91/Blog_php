<?php
use App\Connection;
use App\Table\CommentTable;

$title = 'Mon blog';
$pdo = Connection::getPDO();

$table = new CommentTable($pdo);
[$posts, $pagination] = $table->findPaginated();
$chapo = [];
$comments = (string)

$link =  $router->url('comment');
require_once ('../views/comment/index.php');
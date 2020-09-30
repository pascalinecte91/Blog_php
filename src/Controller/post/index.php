<?php
use App\Connection;
use App\Table\PostTable;

$title = 'Mon blog';
$pdo = Connection::getPDO();

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link =  $router->url('blog');
require_once('../views/post/index.php');
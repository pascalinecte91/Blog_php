<?php
namespace App\Controller;
use \App\Connection;
use \App\Table\CommentTable;


$id =(int)$params['id'];
$author = $params['author'];

$pdo = Connection::getPDO();
$comment = (new CommentTable($pdo))->findByPostID($id);


require_once ('../views/comment/show.php');
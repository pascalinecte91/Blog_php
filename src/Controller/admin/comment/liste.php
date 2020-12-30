<?php

use App\Connection;
use App\Table\CommentTable;
use App\Table\PostTable;

use App\Auth;

Auth::check();
/*$post = $postTable ->find($params['id']);*/
$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_comment_list');
/*[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
[$comments, $pagination] = (new CommentTable($pdo))->findPaginated();*/

$case = "1";

$postTable = new PostTable($pdo);
$commentTable =new CommentTable($pdo);
$comments = $commentTable ->findByPostID($params['id']);


$ko= 'red';
$isValid = 'primary';
$post = $postTable ->find($params['id']);



require_once('../views/admin/comment/liste.php');

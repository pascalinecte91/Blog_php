<?php

use App\Connection;
use App\Table\CommentTable;
use App\Table\PostTable;

$slug =$params['slug'];

$id =(int)$params['id'];
$comment =[];

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
$post = (new PostTable($pdo))->find($id);
[$posts, $pagination] = $table->findPaginated();
$comments =(New CommentTable($pdo))->findByPostID($id);

if($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug'=> $post->getSlug(), 'id' => $id]);
    http_response_code(301); 
    header('Location: ' . $url);   

}
$link =  $router->url('post');
require_once ('../views/post/show.php');


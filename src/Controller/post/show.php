<?php
use App\Connection;
use App\model\{Post, Category};
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Table\CommentTable;


$id =(int)$params['id'];
$slug = $params['slug'];



$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);


if($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug'=> $post->getSlug(), 'id' => $id]);
    http_response_code(301); 
    header('Location: ' . $url);
}
require_once('../views/post/show.php');
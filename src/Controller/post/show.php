<?php

use App\Connection;
use App\Model\CommentManager;
use App\Model\PostManager;

$slug = $params['slug'];
$id = (int)$params['id'];
$comment = [];
$pdo = Connection::getPDO();
$manager = new PostManager($pdo);
$post = (new PostManager($pdo))->find($id);
[$posts, $pagination] = $manager->findPaginated();
$comments = (new CommentManager($pdo))->findByPostID($id);
$is_valid = true;
if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
$link =  $router->url('post');

require_once('../views/post/show.php');
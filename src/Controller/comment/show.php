<?php
namespace App\Controller;
use \App\Connection;
use \App\Table\CommentTable;


$id =(int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$comment = (new CommentTable($pdo))->find($id, $author);

if($comment->getChapo() !== $chapo) {
    $url = $router->url('comment',['chapo'=> $comment->getChapo(), 'author'=>$author->getAuthor(), 'id' => $id]);
    http_response_code(301); 
    header('Location: ' . $url);
}

$title = "Commentaire {$comment->getContent()}";

[$comments, $paginatedQuery] = (new CommentTable($pdo))->findPaginatedForComment($comment->getAuthor());

$link = $router->url('comment', ['id' => $comment->getID(), 'chapo' => $comment->getChapo(), 'author' =>$comment->getComment()]);

require_once ('../views/comment/show.php');
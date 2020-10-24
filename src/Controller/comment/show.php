<?php
namespace App\Controller;
use \App\Connection;
use \App\Table\CommentTable;


$id =(int)$params['id'];
$author = $params['author'];

$pdo = Connection::getPDO();
$comment = (new CommentTable($pdo))->find($id, $author);



$title = "Commentaire {$comment->getContent()}";

[$comments, $paginatedQuery] = (new CommentTable($pdo))->findPaginated($comment->getAuthor());

$link = $router->url('comment', ['id' => $comment->getID(), 'chapo' => $comment->getChapo(), 'author' =>$comment->getComment()]);

require_once ('../views/comment/show.php');
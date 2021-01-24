<?php

use App\Validators\CommentValidator;
use App\Table\PostTable;
use App\Table\CommentTable;
use App\ObjectHelper;
use App\Model\Comment;
use App\HTML\Form;
use App\Connection;

$slug = $params['slug'];
$pdo = Connection::getPDO();
$id = (int)$params['id'];
$post = (new PostTable($pdo))->find($id);

$errors = [];
$comment = new Comment();
$pdo = Connection::getPDO();
$comments = (new CommentTable($pdo))->findByPostID($id);
$comment->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $commentTable = new CommentTable($pdo);
    $_POST['post_id'] = (int)$params['id'];
    $v = new CommentValidator($_POST, $commentTable, $comment->getID());


    ObjectHelper::hydrate($comment, $_POST, ['author', 'content', 'post_id',]);
    if ($v->validate()) {
        $commentId = $commentTable->createComment($comment);

        /* $commentTable->addComment($comment);*/

        $url = $router->url('post', ['slug' => $slug, 'id' => $id]);
        http_response_code(301);
        header('Location: ' . $url);
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($comment, $errors);
require_once('../views/post/show.php');


<?php

use App\Validators\CommentValidator;
use App\Model\PostManager;
use App\Model\CommentManager;
use App\ObjectHelper;
use App\Model\Comment;
use App\HTML\Form;
use App\Connexion;

$slug = $params['slug'];
$pdo = Connexion::getPDO();
$id = (int)$params['id'];
$post = (new PostManager($pdo))->find($id);

$errors = [];
$comment = new Comment();
$comments = (new CommentManager($pdo))->findByPostID($id);
$comment->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $commentManager = new CommentManager($pdo);
    $_POST['post_id'] = (int)$params['id'];
    $v = new CommentValidator($_POST, $commentManager, $comment->getID());
    ObjectHelper::hydrate($comment, $_POST, ['author', 'content', 'post_id',]);

    if ($v->validate()) {
        $commentId = $commentManager->createComment($comment);
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


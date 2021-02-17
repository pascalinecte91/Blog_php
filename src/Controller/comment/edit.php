<?php

use App\Connection;
use App\Model\CommentManager;
use App\Validators\CommentValidator;
use App\HTML\Form;
use App\ObjectHelper;

$pdo = Connection::getPDO();
$CommentManager = new CommentManager($pdo);
$comment = $CommentManager->find($params['id']);
$success = false;
$errors = [];
$chapo = [];

if (!empty($_POST)) {
    $data = array_merge($_POST);
    $v = new CommentValidator($data, $CommentManager, $comment->getID());
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at', 'post_id']);
}
$form = new Form($comment, $errors);
require_once('../views/comment/edit.php');

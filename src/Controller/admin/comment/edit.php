<?php

use App\Connection;
use App\Table\CommentManager;
use App\HTML\Form;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connection:: getPDO();
$CommentManager = new CommentManager($pdo);
$comment = $CommentManager ->find($params['id']);
$success = false;
$errors = [];
$comments =[];

if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $v = new CommentValidator($data, $CommentManager, $comment->getID(), );
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at']);
    if ($v->validate()) {
        $CommentManager->updateComment($comment);

        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($comment, $errors);

require_once('../views/admin/comment/edit.php');

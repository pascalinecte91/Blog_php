<?php

use App\Connection;
use App\Table\CommentTable;
use App\HTML\Form;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connection:: getPDO();
$commentTable = new CommentTable($pdo);
$comment = $commentTable ->find($params['id']);
$success = false;
$errors = [];
$comments =[];

if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $v = new CommentValidator($data, $commentTable, $comment->getID(), );
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at']);
    if ($v->validate()) {
        $commentTable->updateComment($comment);

        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($comment, $errors);

require_once('../views/admin/comment/edit.php');

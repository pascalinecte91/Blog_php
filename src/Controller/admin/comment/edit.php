<?php

use App\Connexion;
use App\Model\CommentManager;
use App\HTML\Form;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connexion:: getPDO();
$commentManager = new CommentManager($pdo);
$comment = $commentManager ->find($params['id']);
$approve=1;
$errors = [];
$comments =[];
$success= false;
if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    //$v = new CommentValidator($data, $commentManager, $comment->getID(), );
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at']);

    if ($comment->validate()) {
        $commentManager->updateComment($comment);
        $success = true;
    }
    //if ($v->validate()) {
    //} else {
        //$errors = $v->errors();
   // }
}

$form = new Form($comment, $errors);

require_once('../views/admin/comment/edit.php');

<?php

use App\Connexion;
use App\Model\CommentManager;
use App\HTML\Form;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connexion:: getPDO();
$commentManager = new CommentManager($pdo);
$comment = $commentManager ->find($params['id']);
$approve=1;
$errors = [];
$comments =[];
$successC= false;
if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at']);

    if ($comment->validate()) {
        $commentManager->updateComment($comment);
        $successC = true;
        $_SESSION['message_section_c'] = 'comment_modif';

    } else {
        $errors = $v->errors();
    }
}

$form = new Form($comment, $errors);

require_once('../views/admin/comment/edit.php');

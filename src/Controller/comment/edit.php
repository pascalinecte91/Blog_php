<?php

use App\Connexion;
use App\Model\CommentManager;
use App\Validators\;
use App\HTML\Form;
use App\ObjectHelper;

$pdo = Connexion::getPDO();
$commentManager = new CommentManager($pdo);
$comment = $commentManager->find($params['id']);
$success = false;
$errors = [];
$chapo = [];

if (!empty($_POST)) {
    $data = array_merge($_POST);
    $v = new CommentValidator($data, $commentManager, $comment->getID());
    ObjectHelper::hydrate($comment, $data, ['author', 'content', 'created_at', 'post_id']);
}
$form = new Form($comment, $errors);
require_once('../views/comment/edit.php');

<?php
use App \Connection;
use App \Table\CommentTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;



Auth::check();

$pdo = Connection:: getPDO();



$comment = $commentTable ->find($params['id']);
$commentTable->hydrateComments

([$comment]);
$success = false;

$errors = [];

if (!empty($_POST)) {
    $v = new CommentValidator($_POST, $commentTable, $comment->getID(),);
    ObjectHelper::hydrate($_POST, $comment, ['author', 'content', 'created_at']);
    if ($v->validate()) {
        $success = true;
    } else {
       $errors = $v->errors();
    }
}
$form = new Form($comment, $errors);

require_once ('../views/admin/content/edit.php');
<?php
use App \Connection;
use App \Table\PostTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;
use App\Table\CategoryTable;


Auth::check();

$pdo = Connection:: getPDO();



$comment = $commentTable ->find($params['id']);
$commentTable->hydrateComments

([$post]);
$success = false;

$errors = [];

if (!empty($_POST)) {
    $v = new PostValidator($_POST, $commentTable, $post->getID(),);
    ObjectHelper::hydrate($_POST, $comment, ['author', 'comment', 'created_at']);
    if ($v->validate()) {
        $pdo->beginTransaction();
        $pdo->commit();
        $categoryTable->hydratePosts([$post]);
        $success = true;
    } else {
       $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
require_once ('../views/admin/comment/edit.php');
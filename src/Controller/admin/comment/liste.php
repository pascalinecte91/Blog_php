<?php


use App\Connection;
use App\Table\CommentTable;
use App\Table\PostTable;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();
/*$post = $postTable ->find($params['id']);*/
$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_comment_list');
/*[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
[$comments, $pagination] = (new CommentTable($pdo))->findPaginated();*/


$postTable = new PostTable($pdo);
$commentTable = new CommentTable($pdo);
$comments = $commentTable->findByPostID($params['id'], false);
$approve = 1;
$post = $postTable->find($params['id']);
$is_no_valid = false;

if (!empty($_POST)) {
    $v = new CommentValidator($_POST, $commentTable, $comment->getID(), );
    ObjectHelper::hydrate($_POST, $comment, ['author', 'content', 'created_at']);
    if ($v->validate()) {
        $success = true;
    }
}
require_once('../views/admin/comment/liste.php');

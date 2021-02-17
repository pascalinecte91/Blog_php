<?php


use App\Connection;
use App\Table\CommentManager;
use App\Table\PostManager;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();
/*$post = $PostManager ->find($params['id']);*/
$router->layout = "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_comment_list');
/*[$posts, $pagination] = (new PostManager($pdo))->findPaginated();
[$comments, $pagination] = (new CommentManager($pdo))->findPaginated();*/


$PostManager = new PostManager($pdo);
$CommentManager = new CommentManager($pdo);
$comments = $CommentManager->findByPostID($params['id'], false);
$approve = 1;
$post = $PostManager->find($params['id']);
$is_no_valid = false;

if (!empty($_POST)) {
    $v = new CommentValidator($_POST, $CommentManager, $comment->getID(), );
    ObjectHelper::hydrate($_POST, $comment, ['author', 'content', 'created_at']);
    if ($v->validate()) {
        $success = true;
    }
}
require_once('../views/admin/comment/liste.php');

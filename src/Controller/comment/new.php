<?php
use App\Connection;
use App\Table\CommentTable;
use App\HTML\Form;
use App\Validators\CommentValidator;
use App\ObjectHelper;
use App\Model\Comment;




$errors = [];
$comment = new Comment();
$pdo = Connection:: getPDO();


$comment->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $commentTable = new CommentTable($pdo);
    $_POST['post_id'] =(int)$params['id'];
    /*$v = new CommentValidator($_POST, $commentTable, $comment->getID());*/
 

    ObjectHelper::hydrate($comment, $_POST, ['author', 'content','post_id',]);
    /*if ($v->validate()) {*/
       
        $commentid=$commentTable->createComment($comment);
     
       /* $commentTable->addComment($comment);*/
       
        header('Location: ' . $router->url('blog',['id'=> $comment->getID()]) . '?created=1');
        exit();
    /*} else {
       $errors = $v->errors();
    }*/

}
$form = new Form($comment, $errors);
require_once ('../views/comment/new.php');

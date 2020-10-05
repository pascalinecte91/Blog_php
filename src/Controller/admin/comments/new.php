<?php
use App \Connection;
use App \Table\PostTable;
use App \Table\CategoryTable;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Model\Post;
use App\Auth;

Auth::check();

$errors = [];
$post = new Post();
$pdo = Connection:: getPDO();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $postTable = new PostTable($pdo);

    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'created_at', 'comment',]);
    if ($v->validate()) {
        $pdo->beginTansaction();
        $postTable->createPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location: ' . $router->url('admin_post',['id'=> $post->getID()]) . '?created=1');
        exit();
    } else {
       $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
require_once ('../views/admin/comments/new.php');

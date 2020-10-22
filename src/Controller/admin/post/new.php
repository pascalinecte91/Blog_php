<?php
use\App\Attachment\PostAttachment;
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
// l'article creee  date du jour
$chapo = ($post);

if (!empty($_POST)) {
    $postTable = new PostTable($pdo);
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'slug', 'chapo', 'author', 'created_at', 'image']);
    if ($v->validate()) {
        PostAttachment::upload($post);
        $postTable->createPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
       
        header('Location: ' . $router->url('admin_post',['id'=> $post->getID()]) . '?created=1');
        exit();
    } else {
       $errors = $v->errors();  
    }
}
$form = new Form($post, $errors);
require_once ('../views/admin/post/new.php');

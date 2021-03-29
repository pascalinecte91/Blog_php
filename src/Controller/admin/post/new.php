<?php

use App\Attachment\PostAttachment;
use App\Connexion;
use App\Model\PostManager;
use App\HTML\Form;
use App\ObjectHelper;
use App\Model\Post;
use App\Auth;

Auth::check();

$post = new Post();
$pdo = Connexion::getPDO();

$post->setCreatedAt(date('Y-m-d H:i:s'));
$post->setDateLastModification(date('Y-m-d H:i:s'));
$chapo = [];
$errors = [];
$success = false;


if (!empty($_POST)) {
    $postManager = new PostManager($pdo);
    $data = array_merge($_POST, $_FILES);
    $slug= $_POST['name'];
    $slug=str_replace(' ', '_', $slug);
    $post->setSlug($slug);
    
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'chapo', 'author', 'image']);
    PostAttachment::upload($post);
    $postManager->createPost($post);
    $success = true;

 
    /*header('Location: ' . $router->url('admin_post', ['id' => $post->getID()]) . '?created=1');

    exit();*/
}
$form = new Form($post, $errors);
require_once('../views/admin/post/new.php');

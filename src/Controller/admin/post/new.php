<?php

use App\Attachment\PostAttachment;
use App\Connexion;
use App\Model\PostManager;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Model\Post;
use App\Auth;

Auth::check();

$post = new Post();
$pdo = Connexion::getPDO();
$post->setCreatedAt(date('Y-m-d H:i:s'));
$chapo = [];
$errors = [];
$success = false;


if (!empty($_POST)) {
    $postManager = new PostManager($pdo);
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postManager, $post->getID(), );
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'slug', 'chapo', 'author', 'created_at', 'image']);

    if ($v->validate()) {
        PostAttachment::upload($post);
        $postManager->createPost($post);
    $success = true;

  } else {
        $errors = $v->errors();
  }
        /*header('Location: ' . $router->url('admin_post', ['id' => $post->getID()]) . '?created=1');

        exit();*/
   
}
$form = new Form($post, $errors);
require_once('../views/admin/post/new.php');
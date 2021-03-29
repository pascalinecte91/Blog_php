<?php

use App\Attachment\PostAttachment;
use App\Connexion;
use App\Model\PostManager;
use App\HTML\Form;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connexion::getPDO();
$postManager = new PostManager($pdo);
$post = $postManager->find($params['id']);
$post->setDateLastModification(date('Y-m-d H:i:s'));
$success = false;
$errors = [];
$chapo = [];
$comment = [];

if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $slug= $_POST['name'];
    $slug=str_replace(' ', '_', $slug);
    $post->setSlug($slug);
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'chapo', 'author', 'image']);
    PostAttachment::upload($post);
    $postManager->updatePost($post);
    $success = true;
    $_SESSION['message_section'] = 'post_modif';
}
$form = new Form($post, $errors);

require_once('../views/admin/post/edit.php');
<?php

use App\Attachment\PostAttachment;
use App\Connexion;
use App\Model\PostManager;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connexion::getPDO();
$postManager = new PostManager($pdo);
$post = $postManager->find($params['id']);
$success = false;
$errors = [];
$chapo = [];
$comment = [];

if (!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postManager, $post->getID());
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'slug', 'author', 'chapo', 'created_at', 'image']);
    
    if ($v->validate()) {
        PostAttachment::upload($post);
        $postManager->updatePost($post);
        $success = true;
        $_SESSION['message_section'] = 'comment_modif';

        
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);

require_once('../views/admin/post/edit.php');
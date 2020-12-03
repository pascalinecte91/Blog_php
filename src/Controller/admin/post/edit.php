<?php
use App\Attachment\PostAttachment;
use App\Connection;
use App\Table\PostTable;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;



Auth::check();

$pdo = Connection:: getPDO();
$postTable = new PostTable($pdo);


$post = $postTable ->find($params['id']);

$success = false;

$errors = [];
$chapo =[];
$comment =[];



if (!empty($_POST))
 {
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postTable, $post->getID());
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'slug', 'author', 'chapo', 'created_at', 'image']);
    if ($v->validate()) {
      
        PostAttachment::upload($post);
        $postTable->updatePost($post);
      
     
        $success = true;
    } else {
       $errors = $v->errors(); 
        
    }
}
$form = new Form($post, $errors);
require_once ('../views/admin/post/edit.php');

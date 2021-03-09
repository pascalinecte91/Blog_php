<?php

use App\Connexion;
use App\Model\CommentManager;
use App\Auth;

Auth::check();

$pdo = Connexion::getPDO();
$manager = new CommentManager($pdo);
$comment = $manager->findById($params['id']);
$manager->approve($comment);
$success = true;
header('Location:' . $router->url('admin_comments') . '?approve=1');
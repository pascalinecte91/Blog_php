<?php
use App\Connection;

use App\Auth;

Auth::check();

$title= "Gestion des Commentaires";
$pdo = Connection::getPDO();
$link = $router->url('admin_comments');


require_once ('../views/admin/comment/index.php');



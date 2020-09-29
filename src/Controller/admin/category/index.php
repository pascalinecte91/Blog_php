<?php
use App\Connection;
use App\Table\CategoryTable;
use App\Auth;

Auth::check();

$title= "Gestion des Catégories";
$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();

require_once ('../views/admin/category/index.php');



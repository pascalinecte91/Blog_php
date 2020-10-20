<?php
use \App\Connection;


use \App\Table\CategoryTable;
use \App\Table\PostTable;

$id =(int)$params['id'];
$slug = $params['slug'];



$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);

if($category->getSlug() !== $slug) {
    $url = $router->url('category',['slug'=> $category->getSlug(), 'id' => $id]);
    http_response_code(301); 
    header('Location: ' . $url);
}

$title = "Categorie {$category->getName()}";

[$posts, $paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getID());

$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);

require_once ('../views/category/show.php');
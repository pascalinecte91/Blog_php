<?php
$categories = [];
foreach($post->getCategories() as $category) {
$url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
$categories[] = <<<HTML
    <a href="{$url}">{$category->getName()}</a>
HTML; 
} 
require_once('../views/post/card.php');
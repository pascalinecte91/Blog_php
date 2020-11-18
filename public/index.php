<?php

require '../vendor/autoload.php';
use App\Router;

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run ;
$whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops -> register();

/* pour mieux definir le path des upload*/
define('UPLOAD_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'uploads');

if (isset($_GET['page']) && $_GET['page'] ==='1') {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri = $uri. '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}

    $router = new App\Router() ;
    $router
    ->get('/', 'home/index', 'home')
    ->get('/blog', 'post/index', 'blog')
    ->get('/blog',  'comment/index','comment')
   
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
    ->post('/blog/[*:slug]-[i:id]/comments', 'post/show', 'comment_new')
    ->match('/login', 'auth/login', 'login')
    ->post('/logout', 'auth/logout', 'logout')
   


    //ADMIN
    // GESTION DES ARTICLES
    ->get('/admin', 'admin/post/index', 'admin_posts')
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')


 

    //GESTION COMMENTAIRES
    ->match('/admin/comment/new', 'admin/comment/new', 'admin_comment_new')
    ->run();

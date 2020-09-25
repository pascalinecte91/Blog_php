<?php
use App\Connection;
use App\model\{Post, Category};
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Table\CommentTable;


$id =(int)$params['id'];
$slug = $params['slug'];



$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);


if($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug'=> $post->getSlug(), 'id' => $id]);
    http_response_code(301); 
    header('Location: ' . $url);
}
?>

<h5><?= e($post->getName()) ?></h5> 
<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y H:i') ?></p>
<?php foreach($post->getCategories() as $k => $category):
     if ($k > 0):
        echo ', ';
     endif;
        $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
        ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a><?php
    endforeach ?>
<p><?= $post->getFormattedContent() ?></P>

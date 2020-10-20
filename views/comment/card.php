<?php
$comment = [];
foreach($post->getComment() as $comment) {
$url = $router->url('comment', ['id' => $comment->getID(), 'slug' => $comment->getSlug(), 'author' => $comment->getComment]);
$comments[] = <<<HTML
    <a href="{$url}">{$comment->getName()}</a>
HTML; 
} 

?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <a href="index.php">
        <h2 class="post-title"><?= e($post->getName()) ?></h2> 
        <p class="post-meta">Posted by</a>
        <a href="#"> auteur de l'article</a>

            <?= $comment->getAuthor() ?>
            <?= $comment->getChapo() ?>
            <?= $comment->getCreatedAt()->format('d F Y H:m') ?>
            <?php if (!empty($comment->getChapo())): ?>
    
        <?= implode(', ', $comments) ?>  
        <?php endif ?>

    <p><?= $comment->getExcerpt() ?></p>
    
     </div>
        <a href="<?= $router->url('comment', ['id' => $comment->getID(), 'slug' => $comment->getSlug(), 'author' => $comment->getAuthor]) ?>" class="btn btn-secondary">Voir suite</a>
            </div>  

</div>
<?php

?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <a href="index.php">
            
        <h2 class="post-title"><?= e($post->getName()) ?></h2> 
        <p class="post-meta">Posted by</a>
        <a href="#"> auteur de l'article</a>

            <?= $post->getAuthor() ?>
            <?= $post->getChapo() ?>
            <?= $post->getContent()?>
            <?= $post->getCreatedAt()->format('d F Y H:m') ?>
            <?php if (!empty($post->getChapo())): ?>
    
        <?= implode(', ', $posts) ?>  
        <?php endif ?>

    <p><?= $post->getExcerpt() ?></p>
    
     </div>
        <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-secondary">Voir suite</a>
            </div>  

</div>

<div class="card mb-3">
    <div class="card-body"> 
        <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5> 
        <p class="text-muted">
            <?= $post->getCreatedAt()->format('d F Y H:m') ?>
            <?php if (!empty($post->getCategories())): ?>
        
        <?= implode(', ', $categories) ?>  
        <?php endif ?>
    </p>
    <p><?= $post->getExcerpt() ?></p>
    <p>
        <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir suite</a>
    </p>
</div>
</div>
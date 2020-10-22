
        

<h2><?= e($post->getName()) ?></h2>
<p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y H:i') ?></p>
<h5 class="post-subtitle">Chapo:<br>

    <?= e($post->getChapo()) ?><hr></h5>
    <?php if ($post->getImage()): ?>
      
<p>
  <div class="text-center">
    <img src="<?= $post->getImageURL('large') ?>" alt="image" style="width: 780px;"> 
    </div>
</p>
<?php endif ?>
<p class="post-subtitle"> Contenu du post:<br></p>


  <blockquote class="blockquote">
<p><?= $post->getFormattedContent() ?></p>

</blockquote>
<hr>

Auteur(e) :<?= e($post->getAuthor()) ?><br>
Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>
<hr>

<?php

/*<h4 class="post-subtitle">Chapo:<br>
   <a href="<?= $router->url('post', ['chapo' => $post->getChapo(), 'chapo' => $post->getChapo()]) ?>">
      <?= e($post->getChapo()) ?></a>
</h4>*/
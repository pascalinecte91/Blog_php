
<h2><?= e($post->getName()) ?></h2>
<p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y H:i') ?></p>
<h5 class="post-subtitle">Chapo:<br>
   
      <?= e($post->getChapo()) ?></a>
</h5>
<p class="post-subtitle"> Sujet - Contenu:<br></p>
  <blockquote class="blocquote">
<p><?= $post->getFormattedContent() ?></p>
</blockquote>
Posté par :<?= e($post->getAuthor()) ?><br>
Le: <?= $post->getCreatedAt()->format('d F Y H:m') ?>


<?php


/*<h4 class="post-subtitle">Chapo:<br>
   <a href="<?= $router->url('post', ['chapo' => $post->getChapo(), 'chapo' => $post->getChapo()]) ?>">
      <?= e($post->getChapo()) ?></a>
</h4>*/
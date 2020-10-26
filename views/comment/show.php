

<h2><?= e($comment->getComment()) ?></h2>


<h5 class="post-subtitle">
<?=$comment->getAuthor()?></h5>

Le: <?= $comment->getCreatedAt()->format('d F Y H:m') ?>
<hr>




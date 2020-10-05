
<h1><?= e($title) ?></h1>

<?php foreach($posts as $post): ?>
    <div class="col-md-3">
    <?php require dirname(__DIR__) . '/post/card.php'?>
    </div>
    <?php endforeach ?>


<div class="d-flex justify-content-between my-4 ">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>





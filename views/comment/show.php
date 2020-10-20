
<h1><?= e($title) ?></h1>

<?php foreach($comments as $comment): ?>
    <div class="col-md-3">
    <?php require dirname(__DIR__) . '/comment/card.php'?>
    </div>
    <?php endforeach ?>


<div class="d-flex justify-content-between my-4 ">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>





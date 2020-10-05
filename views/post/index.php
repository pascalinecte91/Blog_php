
<div class="text-center">
<h1> Mo blog </h1>
</div>

<div class="row">
<?php foreach($posts as $post): ?>
    <div class="col-lg-6"> 
    <?php require 'card.php' ?>     
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justifu-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
    </div>
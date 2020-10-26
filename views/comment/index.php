
<div class="text-center">
<h1> Mon blog </h1>
</div>

<div class="row">
<?php foreach($comments as $comment): ?>
    <div class="col-lg-12"> 
    <?php require 'comment.php' ?>     
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
    </div>
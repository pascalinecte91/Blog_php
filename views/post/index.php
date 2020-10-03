
<div class="text-center">
<h1> Mon blog</h1>
</div>

<div class="row">
<?php foreach($posts as $post): ?>
    <div class="col-md-6"> 
    <?php require 'card.php' ?>     
    </div>
    <?php endforeach ?>
</div>

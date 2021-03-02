<?php if ($success) : ?> 
    <div class="alert alert-warning" div style=" width:350px">
    L'article été  enregistré!
    </div>
    <?php endif ?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" div style=" width:650px">
        L'article n'a pas pu être enregistré, merci d'y apporter les modifications nécessaires !
    </div>
<?php endif ?>

<h2>NOUVEAU POST </h2>
<?php require('_form.php') ?>
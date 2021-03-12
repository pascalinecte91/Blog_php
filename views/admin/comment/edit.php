 <?php if ($successC) {
    header('Location: ' . $router->url('admin_posts'));
    exit();
} ?>

<h5 style="color:red ; text-align:center" >Attention ! vous allez effectuer une modification sur le commentaire <?= e($comment->getID()) ?></h5><br>

 
    <?php if ($errors) : ?>

    <div class="alert alert-danger">
        Le commentaire n'a pas pu être modifié !
    </div>

<?php endif ?>

<?php require('_form.php') ?>

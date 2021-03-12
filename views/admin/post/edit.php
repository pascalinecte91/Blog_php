
<?php if($success) {
header('Location: ' . $router->url('admin_posts'));
exit();
} ?>
<h5 style="color:red ; text-align:center" >Attention ! vous allez effectuer une modification sur le Post <?= e($post->getID()) ?></h5><br>


<?php if (!empty($errors)) : ?>
<div class="alert alert-danger">
    L'article n'a pas pu être modifié!
</div>
<?php endif ?>

<h2><?= e($post->getName()) ?></h2>

<?php require('_form.php') ?>
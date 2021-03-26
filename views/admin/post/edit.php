
<?php if ($success) {
    header('Location: ' . $router->url('admin_posts'));
    exit();
} ?>
    <div class="rappel_id">
        <h5>Attention ! vous allez effectuer une modification sur le Post <?= e($post->getID()) ?></h5><br>
    </div>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">L'article n'a pas pu être modifié!
      </div>
<?php endif ?>

<h2><?= e($post->getName()) ?></h2>

<?php require('_form.php') ?>
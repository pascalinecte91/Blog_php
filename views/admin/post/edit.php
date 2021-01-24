<?php if ($success) : ?>
    <div class="alert alert-success">
        L'article a ete correctement modifié!
    </div>
<?php endif ?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être modifié
    </div>
<?php endif ?>
<h2><?= e($post->getName()) ?></h2>

<?php require('_form.php') ?>

<?php if ($success): ?>
<div class="alert alert-success">
L'article a ete correctement modifié!
</div>
<?php endif ?>

<?php if (isset($_GET['created'])): ?>
<div class="alert alert-success">
L'article a ete correctement crée
</div>
<?php endif ?>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
L'article n'a pas pu être modifié
</div>
<?php endif ?>

<h1>Editer l'article <?= e($post->getName()) ?></h1>

<?php require('_form.php') ?>

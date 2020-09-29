
<?php if ($success): ?>
<div class="alert alert-success">
La catégorie a ete correctement modifiée!
</div>
<?php endif ?>

<?php if (isset($_GET['created'])): ?>
<div class="alert alert-success">
La catégorie a été correctement crée
</div>
<?php endif ?>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
La catégorie n'a pas pu être modifiée
</div>
<?php endif ?>

<h1>Editer la catégorie <?= e($item->getName()) ?></h1>

<?php require('_form.php') ?>

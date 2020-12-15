
<?php if ($success): ?>
<div class="alert alert-success">
Le commentaire a ete correctement modifié!
</div>
<?php endif ?>



<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
Le commentaire n'a pas pu être modifié
</div>
<?php endif ?>
<h2><?= e($comment->getContent()) ?></h2>

<?php require('_form.php') ?>


<?php if (isset($_GET['created'])): ?>
<div class="alert alert-success">
Le commentaire a ete correctement crée
</div>
<?php endif ?>

<h1>Editer le commentaire <?= e($post->getName()) ?></h1>

<?php require('_form.php') ?>

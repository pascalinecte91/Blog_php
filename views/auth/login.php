
<h1>Se connecter</h1>
<div style="padding-left: 15px; margin-top:30px; padding-top: 10px; border: 4px solid #A0A0A0; text-align:left;">

<?php if(isset($_GET['forbidden'])): ?>
<div class="alert alert-danger">
    Vous ne pouvez pas acceder à cette page
</div>
<?php endif ?>

<form action="<?= $router->url('login') ?>" method="POST">
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    <?= $form->input('password', 'Mot de passe'); ?>
 </div>   
 <br>
    <button type ="submit" class="btn btn-secondary"div style=" margin-bottom:20px;">Se connecter</button>
</form>

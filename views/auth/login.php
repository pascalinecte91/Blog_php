<div class="col-12 text-center">

    <h1>Nom d'utilisateur & Mot de passe <br> sont nécessaires</h1>
</div>
<div style="padding-left: 15px; padding-top: 20px;padding-bottom: 20px; margin-bottom: 30px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">
    <?php if (isset($_GET['forbidden'])) : ?>
        <div class="alert alert-danger">Vous ne pouvez pas acceder à cette page</div>

    <?php endif ?>

    <form action="<?= $router->url('login') ?>" method="POST">
        <?= $form->input('username', 'Nom d\'utilisateur'); ?>
        <?= $form->input('password', 'Mot de passe'); ?>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary">Se connecter</button>
        </div>
</div>
</form>
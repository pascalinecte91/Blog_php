<?php if (isset($_POST['forbidden'])) : ?>
    <div class="alert alert-danger">Vous ne pouvez pas acceder à cette page</div>
<?php endif ?>

<div class="col-12 text-center">
    <div style="padding-left: 15px; padding-top: 20px;padding-bottom: 20px; margin-bottom: 30px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">

    <form class="box text" action ="<?= $router->url('login_register') ?>" method="POST" name="login_register">

    <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3><br>

<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
    <p> les champs ne sont pas conforment</p>
    <ul>
<?php foreach($errors as $error): ?>
<li><?= $error; ?> </li>

<?php endforeach; ?>
    </ul>
</div>
<?php  endif;?>

    <input type="text" name="pseudo" class="form-control " placeholder="Choisissez un PSEUDO" />
    <p class="help-block"></p>
    <input type="password"  name="password" class="form-control"placeholder="choisissez un mot de passe" />
    <p class="help-block"></p>
    <input type="password"  name="password_confirm" class="form-control" placeholder="confirmez votre mot de passe"  />
    <p class="help-block"></p>
    </form>
    </div>
</div>
    
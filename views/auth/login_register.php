<?php require ("../views/alert.php"); ?>

<div class="col-12 text-center">
    <div style="padding-left: 15px; padding-top: 20px;padding-bottom: 20px; margin-bottom: 30px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">

    <form class="box text" action ="<?= $router->url('login_register') ?>" method="POST" name="login_register">

    <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3><br>



    <input type="text" name="username" class="form-control " placeholder="Choisissez un PSEUDO" />
    <p class="help-block"></p>
    <input type="password"  name="password" class="form-control"placeholder="choisissez un mot de passe" />
    <p class="help-block"></p>
    <input type="password"  name="password_confirm" class="form-control" placeholder="confirmez votre mot de passe"  />
    <p class="help-block"></p>
    <p class="help-block">
    <button type="submit" class="btn btn-danger ">Transmettre</button>
    </p>
    </form>
    </div>
</div>

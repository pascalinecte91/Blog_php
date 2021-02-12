<?php if (!empty($errors)) : ?>

 <div class="alert alert-danger alert-dismissible" style="width: 700px;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
        <p> Les champs ne sont pas remplis correctement  REGISTER ! </p>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?> </li>

    <?php endforeach; ?>
</ul>
</div>

<?php  endif;?>

<div class="d-flex justify-content-center">
    <div id="form_insc">
        <div class="col-12 text-left">
            <form  action ="<?= $router->url('login_register') ?>" method="POST" name="login_register" >
                <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3><br>
                <label for=""> Pseudo</label>
                <input type="text"  name="username" class="form-control "  />
                <label for="">Mot de Passe</label>
                <input type="password" name="password" class="form-control" />
                <label for="">Confirmez votre MP</label>
                <input type="password" name="password_confirm" class="form-control"  /><br>
                    <div class="d-flex justify-content-center">
                    <button type="submit" name="envoyer" class="btn btn-danger mb-2">S'INSCRIRE</button>
                    </div>
            </form>
        </div>
    </div>
</div>


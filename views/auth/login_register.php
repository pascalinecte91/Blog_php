<?php if(!empty($errors)): ?>
 <div class="alert alert-dark alert-dismissible" style="width: 550px;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
        <p> Merci de corriger les champs ! </p>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?> </li>

    <?php endforeach; ?>
</ul>
</div>

<?php  endif;?>
<div class="d-flex justify-content-center">
<div id="form_insc">
<div class="col-12 text-center">
    <form class="box text" action ="<?= $router->url('login_register') ?>" method="POST" name="login_register" required>
    <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3><br>
    <label for="username">Votre PSEUDO</label>
    <input type="text" id="username" name="username" class="form-control " required />
    <label for="password">Mot de Passe</label>
    <input type="password" id="password"  name="password" class="form-control" required/>
    <label for="password">Confirmez votre MP</label>
    <input type="password" id="password" name="password_confirm" class="form-control"  required /><br>

    <button type="submit" class="btn btn-danger ">Transmettre</button>
    </p>
    </form>
    </div>
</div>
</div>


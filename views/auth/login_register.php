<?php if (!empty($errors)): ?>
 <div class="alert alert-danger alert-dismissible" style="width: 700px;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
        <p> Merci de corriger les champs et de remplir le formulaire correctement ! </p>
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
    <form  action ="<?= $router->url('login_register') ?>" method="POST" name="login_register" >
        <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3><br>
        <label for=""> Pseudo</label>
            <input type="text"  name="username" class="form-control "  />
        <label for="">Mot de Passe</label>
            <input type="password" name="password" class="form-control" />
        <label for="">Confirmez votre MP</label>
            <input type="password" name="password_confirm" class="form-control"  /><br>
        <button type="submit" class="btn btn-danger ">Transmettre</button>
    </p>
    </form>
    </div>
</div>
</div>


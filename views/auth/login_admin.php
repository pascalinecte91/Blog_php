<?php
$errors = null;
if (!empty($_SESSION['errors'])) {
    $errors = unserialize($_SESSION['errors']);
}

?>
<?php if (!empty($errors)): ?>
    <div class="dismiss_medium">
        <div class="alert alert-dark alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <p> les champs ne sont pas conforment</p>
                <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?> </li>
             <?php endforeach; ?>
                </ul>
        </div>
    </div>
<?php endif; unset($_SESSION['errors']);?> 

<div class="container">
    <div class="d-flex justify-content-center mb-5">
        <div class="row" id="login_a">
            <div class="col-12 text-left">
                <form  action ="<?= $router->url('login_admin') ?>" method="POST" name="login" >
                    <h3 class="box-title text-center mt-3"> Administrateurs : Connectez-vous ici</h3><br>
                    <label for="Pseudo"> Pseudo</label>
                    <input type="text"  name="username" class="form-control my-3"  />
                    <label for="mot de passe">Mot de Passe</label>
                    <input type="password" name="password" class="form-control my-3" />
                        <div class="d-flex justify-content-center"><br>
                      <button type="submit" name="administrator" class="btn btn-primary mb-2">CONNEXION</button> 
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


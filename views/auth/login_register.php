<?php 
$errors = null;
if (!empty($_SESSION['errors'])){
    $errors = unserialize($_SESSION['errors']);
}

?>
<?php if (!empty($errors)):?>
<div class="alert alert-info alert-dismissible" style="width: 700px;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <p> les champs ne sont pas conforment</p>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?= $error; ?> </li>

        <?php endforeach; ?>
    </ul>
</div>
<?php endif; unset($_SESSION['errors']);?> 


<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row" id="form_insc">
            <div class="col-12 text-left">
                <form  action ="<?= $router->url('login_register') ?>" method="POST" name="login_register">
                    <h3 class="box-title text-center"> INSCRIVEZ - VOUS</h3><br>
                    <label for=""> Pseudo</label>
                    <input type="text"  name="username" class="form-control "  />
                    <label for="">Mot de Passe</label>
                    <input type="password" name="password" class="form-control" />
                    <label for="">Confirmez votre MP</label>
                    <input type="password" name="password_confirm" class="form-control"  /><br>
                        <div class="d-flex justify-content-center">
                        <button type="submit" name="register" class="btn btn-danger mb-2">S'INSCRIRE</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>



                
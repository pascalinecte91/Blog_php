<?php if (!empty($errors)): ?>
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
<?php  endif;?>


<div class="text-center">
    <h2>SE CONNECTER</h2><br><br><br>
</div>
<div class="login_a my-5 text-center"><br>
    <h2>ADMINISTRATEURS</h2><br><br><br>
<div class="d-flex justify-content-around">
    <form action="<?= $router->url('login_admin') ?>" method="POST" name="login" required>
        <div class="row ">
            <label for="name"><b>Entrez votre nom d'administrateur</b></label>
                <input type="text" name="username" class="form-control " required >
        </div>
            <div class="row mt-2">
                <label for="password"><b>Mot de passe</b></label>
                    <input type="password" name="password" class="form-control " placeholder="Entrer le mot de passe" required >
                        </div><br>
                            <div class="d-flex justify-content-center">
                                <button  type="submit" class="btn btn-secondary mt-3">CONNECT</button>
                            </div>
    </form>
</div>

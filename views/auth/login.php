
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
<div class="login my-5 text-center "><br>
<h2>ADMINISTRATEUR - MEMBRES</h2><br><br><br>
<div class="d-flex justify-content-around">


    <form action="<?= $router->url('login') ?>" method="POST" name="login">
    <div class="row ">
    <label><b>Entrez votre PSEUDO</b></label>
        <input type="text" name="username" class="form-control " placeholder="votre pseudo" ></div>
        <div class="row mt-2">
    <label><b>Mot de passe</b></label>
        <input type="password" name="password" class="form-control " placeholder="Entrer le mot de passe" ></div><br>
        <div class="d-flex justify-content-center">
    <button class="btn btn-secondary mt-3" type="submit" value="envoyer">LOGIN ->
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1
    .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0
    .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
    </svg>
    </button></div>
    </form>
</div>


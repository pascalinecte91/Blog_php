<div class="col-12 text-center">
  

<div style="padding-left: 15px; padding-top: 20px;padding-bottom: 20px; margin-bottom: 30px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">
    <?php if (isset($_GET['forbidden'])) : ?>
        <div class="alert alert-danger">Vous ne pouvez pas acceder à cette page</div>

    <?php endif ?>
<div class=" text-center">
    <form class="box text" action ="<?= $router->url('login_register') ?>" method="POST" name="login_register">
    <h3 class="box-title"> INSCRIVEZ-VOUS ICI</h3></div>
    <div class="text-center">
        <input type="text" class="box-input mb-3" name="user_membre" placeholder="Nom d'utilisateur" required style= "width: 600px"/></div>
    <div class="text-center">   
        <input type="password" class="box-input mb-5" name="password"  placeholder="Mot de passe" required style="width: 600px "/></div>
    <div class="text-center"> 
        <input type="submit" name="submit"  value="Inscription" style="width: 600px"class="box-button btn btn-danger" /></div><br>
    
      <div class="text-center">
         <p class="box-register">Déjà inscrit?<br>
        
         <a href="index.php">Connectez-vous ici</a></p>
         </div>   
    </form>
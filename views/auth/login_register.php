                
<div class="col-12 text-center">
<div style="padding-left: 15px; padding-top: 20px;padding-bottom: 20px; margin-bottom: 30px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">
  
   

    <form class="box text" action ="<?= $router->url('login_register') ?>" method="POST" name="login_register">
   
      

    <h3 class="box-title text-center"> INSCRIVEZ-VOUS ICI</h3>


<label>Entrez un pseudo</label>      
    <input type="text" class="form-control" placeholder="Choisissez un PSEUDO" id="pseudo" required="Votre nom" name="pseudo"><br>
    <p class="help-block"></p>
    <label>Entrez un mot de passe</label>   
    <input type="password" class="form-control mb-5" placeholder="Mot de passe" required="Mot de passe" name="MDP">
    <p class="help-block"></p>
</form>
</div> 
</div> 
    <div class="text-center"> 
        <input type="submit"  value="Enregistrer" class=" btn btn-danger" /></div><br>
        
      <div class="text-center">
         <p class="box-register">Déjà inscrit?<br>
        
         <a href="//login_register.php">Connectez-vous ici</a></p>
         </div>   
  
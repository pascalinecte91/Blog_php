<?php
$title= 'Accueil';


    $link = $router->url('home'); ?>
   
   

    <div class="d-flex justify-content-center">
 

    </div>
    <h1>Un projet à développer ! Ne le faite pas seul , mais avec moi</h1>
    
    
    <div class="row">
    <div class="col-md-4 ">
    <a href="/Mon_cv_projet_4.pdf">mon cv</a> <br>
    </div>
    <img src="/photo.png" alt="photo"><strong>Pascaline CHRISTOPHE</strong>
</div>

   
    <body>
    
    <class div="container">

    <form action="contact_formulaire.php" method="POST">

        <div class= "row ">
            <div class="col-md-12"> 
                 <div class="form-group">
                     <label for="inputname"><strong> Votre nom</strong</label>
                     <input type ="text" name= "name" class="form-control" id="inputname">
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12"> 
                 <div class="form-group">
                     <label for="inputname"> Votre prénom</label>
                     <input type ="text" name= "surname" class="form-control" id="inputname">
                </div>
            </div>
        </div>
        <div class= "row ">
            <div class="col-md-12"> 
                 <div class="form-group">
                     <label for="inputname">Votre Email</label>
                     <input type ="text" name= "email" class="form-control" id="inputemail"> 
                </div>
            </div>
        </div>
        <div class="row"></div>
            <div class= "clol-md-12">
                <div class="form-group">
                <label type="inputmessage">votre message</label>
                <textarea id="inputmessage"name=" message" class="form-control"></textarea>
            </div>
       </div>
       <div>
            <button type="submit" class="btn btn-secondary">Envoyer</button>
        </form><br><br>
        </body>
        

   
    
    

    <footer>
  
   
    </footer>


    
    
    </div>


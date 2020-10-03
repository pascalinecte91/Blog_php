<?php


if(isset($_POST['email'])) {
 
    $email_to = "votre@email";
      
        echo 
"Des erreurs ont été détectées dans le" .
" formulaire  ";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['message'])) {
        died(
'Le formulaire ne remplit pas les conditions necessaires pour son envoi.');
    }
 
     
 
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $email = $_POST['email']; 
    $number = $_POST['telephone'];
    $message = $_POST['message']; 
    $error_message = "";
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail n\est pas valide.<br />';
    }
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom n\est pas correct.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom n\est pas correct.<br />';
    }
   
    if(strlen($message) < 2) {
      $error_message .= 
'Le message a une erreur.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message .= "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "telephone: ".$telephone."\n";
    $email_message .= "message: ".$message."\n";
 

    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_message, $headers);
    ?>
     
     Nous vous contacterons très bientôt.
     
    <?php

    

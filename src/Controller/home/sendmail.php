<?php


$to = "pascalinecte@gmail.com";
$email_subject = "Email de test";
$email_body = "Salut ceci est un email de test envoyer par un script PHP";
$headers = "From: pascalinecte@gmail.com";
mail($to, $email_subject, $email_body, $headers);

if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Email envoyé avec succès à $to ...";
} else {
    echo "Échec de l'envoi de l'email...";
}
?>

/*$to = 'From: christophepascale@yahoo.fr';
$email_subject = "blog php projet 5: $userName";
$email_body = "vous avez recu un noveau message de : .\n\n"." details:\n\nName: $userName\n\nEmail: $email_address\n\nPhone: $phoneNumber\n\nMessage:\n$accueilMsg";
$headers = "From: monblogphp@pascale-christophe.com\n";
$headers .= "Reply-To: $adressMail";
mail($to,$email_subject,$email_body,$headers);

return true;
?> */




<?php

$link = $router->url('home');

require_once '../views/home/contact_me.php';
?>
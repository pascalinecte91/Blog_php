<?php

ini_set('sendmail_from','monmailtest@yahoo.fr');
$to = 'testonsMail@yahoo.fr';
$email_subject = "blog php projet 5 - envoi d'un mail de la page d'accueil";
$email_body = "vous avez recu un nouveau message de :" . $_POST['name'] ;
$message = "\n\r adresse mail: " . $_POST['email'] . "\r\n numero tel: " . $_POST['phone'] . " \r\n Message:   " . $_POST['message'];
$headers = "From: monAdresseTest@yahoo.fr\n";
$headers .= "Reply-To:" .  $_POST['email'];

mail($to, $email_subject, $message, $headers, $email_body);

   header('Location: ' . $router->url('home'));
            exit();
require_once '../views/home/index.php';


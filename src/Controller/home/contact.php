<?php


if (
    empty($_POST['name'])      ||
    empty($_POST['email'])     ||
    empty($_POST['phone'])     ||
    empty($_POST['message'])  ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    echo "Toutes les cases ne sont pas remplies";
    return false;
}


$server = 'smtp.sendgrid.net';
$port = '587';
$username = 'ocp5';
$password = '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';



$to = 'christophepascale@yahoo.fr';
$email_subject = "blog php projet 5:" . $_POST['name'];
$email_body = "vous avez recu un noveau message de "; // : .\n\n"." details:\n\nName: $userName\n\nEmail: $email_address\n\nPhone: $phoneNumber\n\nMessage:\n$accueilMsg";
$headers = "From: christophepascale@yahoo.fr\n";
$headers .= "Reply-To:" .  $_POST['email'];
/*mail($to,$email_subject,$email_body,$headers);*/

$title = 'Contact';
$link = $router->url('send_mail');
require_once '../views/home/index.php';

echo 'terminer';

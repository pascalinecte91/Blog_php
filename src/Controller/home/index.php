<?php


$server = 'smtp.sendgrid.net';
$port = '587';
$username = 'blog';
$password = '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';


$to = 'nom';
$adressMail = 'email';
$phoneNumber = 'phone';
$message = 'message';
$title = 'Accueil';
$link = $router->url('home');
require_once '../views/home/index.php';

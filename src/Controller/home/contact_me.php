<?php


// Check for empty fields
if(empty($_POST['user_name'])      ||
   empty($_POST['adress_mail'])     ||
   empty($_POST['number_phone'])     ||
   empty($_POST['accueil_msg'])   ||
   !filter_var($_POST['adress_mail'],FILTER_VALIDATE_EMAIL))
   
   {
   echo "No arguments Provided!";
   return false;
   }
   
$userName = strip_tags(e($_POST['user_name']));
$emailAddress = strip_tags(e($_POST['adress_mail']));
$phoneNumber = strip_tags(e($_POST['phone_number']));
$accueilMsg = strip_tags(e($_POST['accueil_msg']));
   
// Create the email and send the message
$to = 'From: monblogphp@pascale-christophe.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $userName";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $userName\n\nEmail: $email_address\n\nPhone: $phoneNumber\n\nMessage:\n$accueilMsg";
$headers = "From: monblogphp.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $emailAddress";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>

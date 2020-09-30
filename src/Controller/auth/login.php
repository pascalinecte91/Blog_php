<?php
use App\Model\User;
use App\HTML\Form;
use App\Connection;
use App\Table\UserTable;
use App\Table\Exception\NotFoundException;

$user = new User();
$errors = [];
if (!empty($_POST)) {
    $user->setusername($_POST['username']);
    $errors['password'] = 'identifiant ou mot de passe incorrect';
    
   if (!empty($_POST['username']) && !empty($_POST['password'])) {
       $table = new UserTable(Connection::getPDO());
       try {
           $u = $table->findByUsername($_POST['username']);
           if (password_verify($_POST['password'], $u->getPassword()) == true) {
                session_start();
                $_SESSION['auth'] = $u->getID();
                header('Location: ' .$router->url('admin_posts'));
               exit();
           }
       } catch (NotFoundException $e) {
       }
   }
}

$form = new Form ($user, $errors);
require_once('../views/auth/login.php');
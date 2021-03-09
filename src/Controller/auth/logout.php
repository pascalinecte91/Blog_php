<?php
session_destroy();
$_SESSION = null;
header('Location: ' . $router->url('login_member'));
exit();

<?php

namespace App;

use \PDO;

class Connexion
{
    public static function getPDO(): PDO
    {
        return new PDO('mysql:host=127.0.0.1;dbname=blog_php;port=3306', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /*PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ*/]);
    }
}

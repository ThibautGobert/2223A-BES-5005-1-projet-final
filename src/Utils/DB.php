<?php

namespace App\Utils;

use PDO;

class DB
{
    public static $pdo;

    public static function getInstance()
    {
        if(!self::$pdo) {
            //on doit se connecter
            $dsn = 'mysql:dbname=portfolio;host=127.0.0.1';
            $user = 'root';
            $password = '';

            self::$pdo = new PDO($dsn, $user, $password);
        }
        return self::$pdo;
    }
}
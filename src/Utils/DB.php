<?php

namespace App\Utils;

class DB
{
    public static $pdo;

    public static function getInstance()
    {
        if(!self::$pdo) {
            //on doit se connecter

        }
        return self::$pdo;
    }
}
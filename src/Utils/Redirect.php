<?php

namespace App\Utils;

class Redirect
{
    public static function to($url, array $params = [])
    {
        foreach ($params as $key => $value) {
            $_SESSION[$key] = $value;
        }
        header('Location: ' . $url);die();
    }
}
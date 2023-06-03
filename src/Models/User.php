<?php

namespace App\Models;

class User extends Model
{
    protected static string $table = 'users';
    public string $name;
    public string $firstname;
    public string $email;
}
<?php

namespace App\Controllers;
use App\Utils\View;

class UserController
{
    public function index()
    {
        $title = 'Index des utilisateurs';
        View::render('users', ['title' => $title]);
    }

    public function edit($id)
    {
        //todo retrouver l'utilisateur en base de données
        dd($id);
    }
}
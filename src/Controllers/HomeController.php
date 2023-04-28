<?php

namespace App\Controllers;

use App\Utils\View;

class HomeController
{
    /**
     * todo récupérer les projets
     * @return void
     */
    public function index()
    {
        $title = 'home';
        View::render('home', ['title' => $title]);
    }
}
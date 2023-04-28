<?php

namespace App\Controllers;

use App\Utils\View;

class BaseController
{
    public function cv()
    {
        View::render('cv');
    }
}
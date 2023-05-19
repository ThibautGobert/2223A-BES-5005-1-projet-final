<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Utils\File;
use App\Utils\View;

class ProjectController
{
    public function create()
    {
        View::render('project.create', [
            'categories' => Category::getList()
        ]);
    }

    public function store()
    {
        $images = File::cleanUpload($_FILES['images']);
        dd($images);
    }

    public function index()
    {
        //todo récupérer les projets en base de donnée et les envoyer à la vue
        View::render('project.index');
    }
}
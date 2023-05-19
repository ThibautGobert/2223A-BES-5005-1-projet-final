<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Project;
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
        //dd($_POST);
        $images = File::cleanUpload($_FILES['images']);
        Project::create([
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        header('Location: /project/index');
    }

    public function index()
    {
        //dd(Project::where(['title' => 'projet 1']));
        //todo récupérer les projets en base de donnée et les envoyer à la vue
        View::render('project.index');
    }
}
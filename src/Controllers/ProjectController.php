<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Image;
use App\Models\Project;
use App\Utils\File;
use App\Utils\Redirect;
use App\Utils\View;

class ProjectController
{
    public function create()
    {

        View::render('project.create', [
            'categories' => Category::getList()
        ]);;
    }
    public function store()
    {

        $images = File::cleanUpload($_FILES['images']);
        foreach ($images as $image) {
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/images/'.$image['name'], file_get_contents($image['tmp_name']));

        }

        /*
        Image::create([
            'name' => $images['name'] ?? null,
        ]);
        */

        Project::create([
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        Redirect::to('/project/index', [
            'success' => 'Projet créé !',
            'error' => '',
        ]);


    }
    public function index()
    {
        //todo récupérer les projets en base de donnée et les envoyer à la vue
        view::render('project.index');
    }
}
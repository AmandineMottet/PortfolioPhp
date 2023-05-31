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
        $project = Project::create([
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        $images = File::cleanUpload($_FILES['images']);

        foreach ($images as $image) {

            // check si il y a un ficher ou non
            if (!empty($image['name']) && $image['tmp_name']) {
                $path = '/images/' . $image['name'];
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $path, file_get_contents($image['tmp_name']));
                Image::create([
                    'path' => $path,
                    'name' => $image['name'],
                    'project_id' => $project->id,
                ]);
            }
        }

        /*
        Image::create([
            'name' => $images['name'] ?? null,
        ]);
        */

        Redirect::to('/project/index', [
            'success' => 'Projet créé !',
            'error' => '',
        ]);


    }

    public function index()
    {
        $projects = Project::all();
        View::render('project.index', ['projects' => $projects]);

    }

    public function edit($id)
    {
        $project = Project::find($id);

        View::render('project.edit', [
            'project' => $project,
            'categories' => Category::getList()
        ]);
    }


    public function update($id)
    {
        Project::update($id, [
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        Redirect::to('/project/index', [
            'success' => 'Projet mis à jour !',
            'error' => '',
        ]);
    }
}
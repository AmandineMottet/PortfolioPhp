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
        $title = 'projets';
        View::render('project.create', [
            'categories' => Category::getList(),
            'title' =>$title
        ]);;
    }

    public function store()
    {
        if($_POST['category_id'] === ""){
            Redirect::to('/project/create', [
                'error' => 'Error',
            ]);
        }
        $project = Project::create([
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        $this->handleImages($project);

        Redirect::to('/project/index', [
            'success' => 'Projet créé !',
        ]);
    }

    public function index()
    {
        $projects = Project::all();
        $title = 'projets';
        View::render('project.index', ['projects' => $projects, 'title' =>$title]);

    }

    public function view($id)
    {
        $project = Project::find($id);
        $title = 'projets';
        View::render('project.view', [
            'project' => $project,
            'title' =>$title
        ]);
    }

    public function edit($id)
    {

        $project = Project::find($id);
        $title = 'projets';

        View::render('project.edit', [
            'project' => $project,
            'categories' => Category::getList(),
            'title' =>$title
        ]);
    }

    private function handleImages(Project $project)
    {
        $images = File::cleanUpload($_FILES['images']);

        foreach ($images as $image) {

            // check si il y a un ficher ou non
            if (!empty($image['name']) && $image['tmp_name']) {
                $path =  '/images/' . $project->id.'/'. $image['name'];
                if(!file_exists($_SERVER['DOCUMENT_ROOT'] .'/images/' . $project->id.'/')) {
                    mkdir($_SERVER['DOCUMENT_ROOT'] . '/images/' . $project->id . '/', 0777, true);
                }

                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $path, file_get_contents($image['tmp_name']));
                Image::create([
                    'path' => $path,
                    'name' => $image['name'],
                    'project_id' => $project->id,
                ]);
            }
        }
    }


    public function update($id)
    {
        if(empty($_POST['category_id']) || $_POST['category_id'] === 'Veuillez sélectionner une catégorie'){
            Redirect::to('/project/'.$id.'/edit', [
                'error' => 'Veuillez sélectionner une catégorie',
                'old' => $_POST
            ]);
        }
        $project = Project::find($id);
        $this->handleImages($project);


        Project::update($id, [
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        Redirect::to('/project/index', [
            'success' => 'Projet mis à jour !',
        ]);
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $image = Image::find($id);
        $projectId = $image->project_id;
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . $image->path)){
            unlink($_SERVER['DOCUMENT_ROOT'] . $image->path);
        }
        Project::delete($id);
        Image::delete($id);

        Redirect::to('/project/index',[
            'success' => 'Projet supprimé avec succes !'
        ]);
    }
}
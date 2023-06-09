<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Project;
use App\Utils\View;

class HomeController
{

    /*
     * Todo : récupérer les projets
     */
    public function index()
    {
        $projects = Project::all(3);
        $title = 'home';
        $categories = '';
        View::render('home', [
            'title'=> $title,
            'projects' => $projects,
            'categories' => Category::getList(),
            ]);
    }
}
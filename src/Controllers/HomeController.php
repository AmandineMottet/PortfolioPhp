<?php

namespace App\Controllers;

use App\Utils\View;

class HomeController
{

    /*
     * Todo : récupérer les projets
     */
    public function index()
    {
        $title = 'home';
        View::render('home', ['title'=> $title]);


    }
}
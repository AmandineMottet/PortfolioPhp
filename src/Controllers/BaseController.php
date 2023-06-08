<?php

namespace App\Controllers;

use App\Utils\DB;
use App\Utils\View;

class BaseController
{
    public function cv(): void
    {
       DB::getInstance();

        View::render('cv');
    }

    public function contact(): void
    {
        DB::getInstance();

        View::render('contact');
    }
}
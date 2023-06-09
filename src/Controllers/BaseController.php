<?php

namespace App\Controllers;

use App\Utils\DB;
use App\Utils\View;

class BaseController
{
    public function cv(): void
    {
        $title = 'cv';
        DB::getInstance();
        View::render('cv', [
            'title' => $title
        ]);
    }

    public function contact(): void
    {
        $title = 'contact';
        DB::getInstance();

        View::render('contact',[
            'title' => $title
        ]);
    }
}
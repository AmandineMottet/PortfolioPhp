<?php

namespace App\Utils;

class View
{
    public static function render(string $viewName, array $params = []) : void
    {
        ob_start();
        extract($params);
        require __DIR__.'/../../views/'.$viewName.'.php';
        $content = ob_get_clean();

        require __DIR__.'/../../views/template/main.php';


        //Pour supprimer les messages de session quand on a créé ou supprimé un projet
        if(isset($_SESSION['success'])) {
            $_SESSION['success'] = null;
        }
        if(isset($_SESSION['error'])) {
            $_SESSION['error'] = null;
        }
    }
}
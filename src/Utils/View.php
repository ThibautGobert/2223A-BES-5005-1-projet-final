<?php

namespace App\Utils;

class View
{
    public static function render(string $viewName, array $params = []) : void
    {
        extract($params);
        ob_start();
        require __DIR__.'/../../views/'.$viewName.'.php';
        $content = ob_get_clean();
        require __DIR__.'/../../views/template/main.php';

        /**
         * On supprime les messages de la session juste après avoir affiché la vue
         */
        if(isset($_SESSION['success'])) {
            $_SESSION['success'] = null;
        }
        if(isset($_SESSION['error'])) {
            $_SESSION['error'] = null;
        }
    }
}
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
    }
}
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
         * Suite à l'affichage d'une vue, on réinitialise toute la session sauf l'utilisateur,
         * ça nous permet de garder l'utilisateur de page en page et de pouvoir tester s'il est bien connecté
         * avec la méthode getUser() de classe Auth
         * Utils\Auth::getUser()
         *
         * ça nous permet également de supprimer les messages d'erreur/succès une fois qu'ils ont été affichés
         *
         * Si on a besoin de garder d'autres variable dans la session il faudra ajouter un if comme pour la clé 'user'
         */

        foreach ($_SESSION as $key => $value) {
            if($key !== 'user'){
                unset($_SESSION[$key]);
            }
        }
    }
}
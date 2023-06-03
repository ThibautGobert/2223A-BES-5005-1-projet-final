<?php

namespace App\Utils;

use App\Models\User;

class Auth
{
    /**
     * Méthode statique qui permet de récupérer l'utilisateur connecté
     * S'il est connecté, la méthode retourne l'objet utilisateur, sinon elle retourne null
     * Dans une vue, on peut l'utiliser comme ceci : Utils\Auth::getUser()
     * @return User|null
     */
    public static function getUser() :? User
    {
        if(isset($_SESSION['user'])) {
            $user = new User();
            $user->id = $_SESSION['user']['id'];
            $user->name = $_SESSION['user']['name'];
            $user->firstname = $_SESSION['user']['firstname'];
            $user->email = $_SESSION['user']['email'];
            $user->password = $_SESSION['user']['password'];
            return $user;
        }
        return null;
    }

    public static function setUser(User|null $user = null) {
        if($user) {
            $_SESSION['user']['id'] = $user->id;
            $_SESSION['user']['name'] = $user->name;
            $_SESSION['user']['firstname'] = $user->name;
            $_SESSION['user']['email'] = $user->email;
            $_SESSION['user']['password'] = $user->password;
        }else {
            $_SESSION['user'] = null;
        }
    }
}
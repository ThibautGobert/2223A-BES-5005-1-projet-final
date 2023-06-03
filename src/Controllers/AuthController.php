<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\Auth;
use App\Utils\DB;
use App\Utils\Redirect;
use App\Utils\View;
use PDO;

class AuthController
{
    public function connexion()
    {
        View::render('connexion');
    }

    public function connect()
    {
        /**
         * On récupère les données introduites par l'utilisateur
         */
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'];

        $pdo = DB::getInstance();

        /**
         * On doit vérifier si un utilisateur correspond à l'email qu'on récupère dans $_POST
         * Si on en trouve un, on doit ensuite vérifier si le mot de passe introduit correspond à celui en base de donnée
         *
         * On crée une requête préparée par sécurité
         * le paramètre :email nous permet de dire à pdo que cette donnée ne doit pas
         * être traitée comme une requête mais comme une donnée.
         */

        $sql = "select * from users where email=:email";
        $statement = $pdo->prepare($sql);
        /**
         * setFetchMode => pour dire à PDO qu'on veut récupérer un objet User
         */
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $statement->execute(['email' => $email]);

        $user = $statement->fetch();

        /**
         *
         * on vérifie le mot de passe envoyé avec celui crypté en DB
         * */
        $passwordOk = password_verify($password, $user->password);

        /**
         * Si le mot de passe est ok
         */

        if($passwordOk) {
            Auth::setUser($user);

            Redirect::to('/', ['success' => 'Connexion réussie !']);
        }
        /**
         * Sinon, on le revoit sur la page de connexion
         * Avec un message d'erreur
         */
        Redirect::to('/', ['error' => 'Email ou mot de passe incorrect']);

    }

    public function inscription()
    {
        View::render('inscription', [
            'title' => 'Page d\'inscription'
        ]);
    }

    public function register()
    {
        /**
         * On récupère les données envoyées par l'utilisateur
         */
        $email = $_POST['email'] ?? null;
        $name = $_POST['name'] ?? null;
        $firstname = $_POST['firstname'] ?? null;
        $password = $_POST['password'] ?? null;
        $password_confirm = $_POST['password_confirm'] ?? null;

        /**
         * Création d'une variable qui contient les données envoyées
         * pour les récupérer en cas d'erreur de validation du formulaire
         */

        $old = [
            'email' => $email,
            'name' => $name,
            'firstname' => $firstname,
        ];

        /**
         * On vérifie si l'email existe déjà en DB
         */
        $users = User::where(['email' => $email]);
        if(count($users) > 0) {
            /**
             * Rediriger l'utilisateur vers la page d'inscription avec un message
             */
            Redirect::to('/inscription', [
                'error' => 'Adresse email déjà utilisée.', 'name' =>$name,
                'old' => $old
            ]);
        }
        /**
         * On vérifie si le mot de passe et le mot de passe de confirmation sont identiques
         */
        if(!$name || !$firstname || !$email) {
            Redirect::to('/inscription', [
                'error' => 'Les champs nom, prénom et email sont requis.',
                'old' => $old
            ]);
        }
        /**
         * On vérifie si le mot de passe et le mot de passe de confirmation sont identiques
         */
        if(!$password || !$password_confirm) {
            Redirect::to('/inscription', [
                'error' => 'Le champ mot de passe et confirmation de mot de passe sont requis.',
                'old' => $old
            ]);
        }
        /**
         * On vérifie si le mot de passe et le mot de passe de confirmation sont identiques
         */
        if($password !== $password_confirm) {
            Redirect::to('/inscription', [
                'error' => 'Le champ mot de passe et confirmation de mot de passe doivent être identique.',
                'old' => $old
            ]);
        }

        /**
         * On insère en base de données
         */

        User::create([
            'firstname' => $firstname,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password , PASSWORD_BCRYPT),
        ]);

        Redirect::to('/', [
            'success' => 'Inscription réussie !',
        ]);
    }

    public function deconnexion()
    {
        $user = Auth::getUser();
        Auth::setUser(null);
        Redirect::to('/', [
            'success' => 'Déconnexion réussie, à bientôt ' . $user->name
        ]);
    }
}
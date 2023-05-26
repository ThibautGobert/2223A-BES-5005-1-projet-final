<?php
session_start();

use App\Controllers\BaseController;
use App\Controllers\HomeController;
use App\Controllers\ProjectController;
use App\Controllers\UserController;
use App\Utils\View;

require '../vendor/autoload.php';

$router = new AltoRouter();

$router->map( 'GET', '/', [HomeController::class, 'index'], 'home');
$router->map( 'GET', '/users', [UserController::class, 'index'], 'user.index');
$router->map( 'GET', '/users/[i:id]/edit', [UserController::class, 'edit'], 'user.edit');

$router->map( 'GET', '/cv', [BaseController::class, 'cv'], 'cv');

$router->map( 'GET', '/project/create', [ProjectController::class, 'create'], 'project.create');
$router->map( 'POST', '/project/store', [ProjectController::class, 'store'], 'project.store');
$router->map( 'GET', '/project/index', [ProjectController::class, 'index'], 'project.index');

$match = $router->match();

if($match) {
    $target = $match['target'];
    $controller = $target[0];
    $methode = $target[1];
    $controller = new $controller();
    $params = $match['params'];

    call_user_func_array([$controller, $methode], $params);
}else {
    View::render('error');
}

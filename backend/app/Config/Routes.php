<?php

use App\Controllers\UsersController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->resource('UserController');
//$routes->get('user', 'UsersController::index');

$routes->group("api", function($routes){
    $routes->get("users", "UsersController::index");
    $routes->get("users/(:num)", "UsersController::show/$1");
    $routes->post("login","LoginController::index");
    $routes->post("create", "UsersController::create");
    $routes->post("users", "UsersController::new");
    $routes->put("users/(:num)", "UsersController::update/$1");
    $routes->delete("users/(:num)", "UsersController::delete/$1");
    $routes->get("users/alumni", "UsersController::alumniList");


    $routes->get("job", "JobController::index");
    $routes->post("job", "JobController::create");

});





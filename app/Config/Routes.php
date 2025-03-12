<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('movies', 'MovieController::index');

$routes->get('reviews/create/(:num)', 'ReviewController::create/$1'); // Fix for 404 error
$routes->post('reviews/store', 'ReviewController::store');
$routes->get('reviews/delete/(:num)', 'ReviewController::delete/$1');

$routes->get('users/register', 'UserController::register');
$routes->post('users/store', 'UserController::store');
$routes->get('users/login', 'UserController::login');
$routes->post('users/authenticate', 'UserController::authenticate');
$routes->get('users/logout', 'UserController::logout');

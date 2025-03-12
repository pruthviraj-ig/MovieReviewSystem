<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('movies', 'MovieController::index');

// Ensure users cannot create movies
//$routes->get('movies/create', 'MovieController::create');  // Removed
//$routes->post('movies/store', 'MovieController::store');   // Removed

// Reviews Routes
$routes->get('reviews/create/(:num)', 'ReviewController::create/$1');
$routes->post('reviews/store', 'ReviewController::store');
$routes->get('reviews/delete/(:num)', 'ReviewController::delete/$1');

// User Authentication Routes
$routes->get('users/register', 'UserController::register');
$routes->post('users/store', 'UserController::store');
$routes->get('users/login', 'UserController::login');
$routes->post('users/authenticate', 'UserController::authenticate');
$routes->get('users/logout', 'UserController::logout');

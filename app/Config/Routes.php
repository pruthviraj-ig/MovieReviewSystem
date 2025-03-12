<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('movies', 'MovieController::index');
$routes->get('movies/create', 'MovieController::create');
$routes->post('movies/store', 'MovieController::store');
$routes->post('reviews/store', 'ReviewController::store');


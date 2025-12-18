<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'Home::index');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');  // ← THIS WAS MISSING!
$routes->get('auth/logout', 'AuthController::logout');

// Protected routes (require login)
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'DashboardController::index'); // Home page = dashboard
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('pets', 'PetsController::index', ['filter' => 'auth']);
    $routes->get('pets/create', 'PetsController::create', ['filter' => 'auth']);
    $routes->post('pets/store', 'PetsController::store', ['filter' => 'auth']);
    $routes->get('residents', 'ResidentsController::index', ['filter' => 'auth']);
    $routes->get('residents/delete/(:num)', 'ResidentsController::delete/$1', ['filter' => 'auth']);
});
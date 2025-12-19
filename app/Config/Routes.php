<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'Home::index');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/logout', 'AuthController::logout');

// Protected routes: Must be logged in
$routes->group('', ['filter' => 'auth'], function($routes) {

    // Resident (regular user) pages - accessible to all logged-in users
    $routes->get('resident/dashboard', 'ResidentsController::dashboard');
    $routes->get('resident/browse', 'ResidentsController::browse');
    $routes->get('resident/my-pets', 'ResidentsController::myPets');
    $routes->get('resident/profile', 'ResidentsController::profile');

    // Pet registration
    $routes->get('resident/register-pet', 'PetsController::create');        // Show form
    $routes->post('resident/register-pet', 'PetsController::store');         // Process form

    // Pets browsing (public or shared)
    $routes->get('pets', 'PetsController::index');

    // Default fallback for logged-in users
    $routes->get('dashboard', 'ResidentsController::dashboard');

    // Admin-only routes
    $routes->group('admin', ['filter' => 'admin'], function($routes) {
        $routes->get('residents', 'ResidentsController::index');
        $routes->get('residents/delete/(:num)', 'ResidentsController::delete/$1');
        // Add more admin routes later
    });
});
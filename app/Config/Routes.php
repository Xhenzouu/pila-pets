<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'AuthController::login');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');

$routes->get('auth/register', 'AuthController::register');
$routes->post('auth/register', 'AuthController::register');
$routes->get('auth/forgot-password', 'AuthController::forgotPassword'); 
$routes->post('auth/forgot-password', 'AuthController::forgotPassword'); 

$routes->get('auth/logout', 'AuthController::logout');

// Protected routes: Must be logged in
$routes->group('', ['filter' => 'auth'], function($routes) {

    // === Resident (regular user) routes ===
    $routes->get('resident/home', 'ResidentsController::home');
    $routes->get('resident/browse', 'ResidentsController::browse');
    $routes->get('resident/my-pets', 'ResidentsController::myPets');
    $routes->get('resident/profile', 'ResidentsController::profile');
    $routes->post('resident/update_profile', 'ResidentsController::updateProfile');

    // Pet registration
    $routes->get('resident/register-pet', 'PetsController::create');
    $routes->post('resident/register-pet', 'PetsController::store');

    // Pets browsing (for logged-in users)
    $routes->get('pets', 'PetsController::index');
    
    // === Admin Dashboard ===
    $routes->get('dashboard', 'AdminController::dashboard');

    // === Admin-only section ===
    $routes->group('admin', ['filter' => 'admin'], function($routes) {
        $routes->get('residents', 'ResidentsController::index');
        $routes->get('residents/delete/(:num)', 'ResidentsController::delete/$1');
    });
});
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/customer', 'CustomerController::index'); 
$routes->get('/customerApi', 'CustomerController::API'); 

// Tambahan pada tugas ini
$routes->get('/coba', 'CobaController::index');
$routes->post('/coba/add', 'CobaController::add');
$routes->post('/coba/update', 'CobaController::update'); 
$routes->post('/coba/delete', 'CobaController::delete'); 
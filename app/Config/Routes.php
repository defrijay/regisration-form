<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/', 'MerchController::index');
$routes->get('/admin', 'MerchController::index');

// CRUD Merhcandise
$routes->get('merch', 'MerchController::index');
$routes->get('merch/create', 'MerchController::create');
$routes->post('merch/store', 'MerchController::store');
$routes->get('merch/edit/(:segment)', 'MerchController::edit/$1');
$routes->post('merch/update/(:segment)', 'MerchController::update/$1');
$routes->post('merch/delete/(:segment)', 'MerchController::delete/$1');



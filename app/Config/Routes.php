<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/daftar', 'RegisterPlatek::index');
$routes->post('daftar/save', 'RegisterPlatek::save');

$routes->get('/admin', 'Admin::index', ['filter' => 'login']);
$routes->get('/admin/acc/(:segment)', 'Admin::accPembayaran/$1', ['filter' => 'login']);
$routes->get('/admin/pending/(:segment)', 'Admin::pendingPembayaran/$1', ['filter' => 'login']);
$routes->get('/admin/delete/(:segment)', 'Admin::delete/$1', ['filter' => 'login']);
$routes->get('/admin/view/(:segment)', 'Admin::view/$1', ['filter' => 'login']);
$routes->get('/acc', 'Admin::acc', ['filter' => 'login']);
$routes->get('/pending', 'Admin::pending', ['filter' => 'login']);

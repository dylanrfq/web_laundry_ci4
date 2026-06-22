<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/', 'Layanan::index');
$routes->get('/layanan', 'Layanan::index');
$routes->get('/layanan/create', 'Layanan::create');
$routes->post('/layanan/save', 'Layanan::save');
$routes->get('/layanan/edit/(:num)', 'Layanan::edit/$1');
$routes->post('/layanan/update/(:num)', 'Layanan::update/$1');
$routes->get('/layanan/delete/(:num)', 'Layanan::delete/$1');
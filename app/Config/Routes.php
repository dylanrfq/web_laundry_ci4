<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


$routes->get('/', 'Auth::login');
$routes->get('/layanan', 'Layanan::index');
$routes->get('/layanan/create', 'Layanan::create');
$routes->post('/layanan/save', 'Layanan::save');
$routes->get('/layanan/edit/(:num)', 'Layanan::edit/$1');
$routes->post('/layanan/update/(:num)', 'Layanan::update/$1');
$routes->get('/layanan/delete/(:num)', 'Layanan::delete/$1');
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/create', 'Pelanggan::create');
$routes->post('/pelanggan/save', 'Pelanggan::save');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:num)', 'Pelanggan::update/$1');
$routes->get('/pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/auth/process', 'Auth::process');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/registerProcess', 'Auth::registerProcess');
$routes->get('/layanan/exportPdf', 'Layanan::exportPdf');
$routes->get('/cart', 'Cart::index');

$routes->get('/cart/add/(:num)', 'Cart::add/$1');

$routes->post('/cart/update', 'Cart::update');

$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');

$routes->get('/cart/destroy', 'Cart::destroy');

$routes->post('/checkout', 'Transaksi::checkout');
$routes->get('/transaksi', 'Transaksi::index');

$routes->get('/pelanggan/pilih/(:num)', 'Pelanggan::pilih/$1');
$routes->get('/transaksi/exportPdf', 'Transaksi::exportPdf');
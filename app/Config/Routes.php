<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/login', 'Auth::login');
// $routes->post('/auth/processLogin', 'Auth::processLogin');
// $routes->get('/register', 'Auth::register');
// $routes->post('/auth/processRegister', 'Auth::processRegister');
// $routes->get('/logout', 'Auth::logout');

// 1. Rute Dashboard HARUS BERDIRI SENDIRI DI SINI
$routes->get('/', function () {
    return redirect()->to('/dashboard');
});
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);

// 2. Rute Produk TETAP DI DALAM GRUP
$routes->group('produk', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'Produk::index');
    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');
    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');
    $routes->delete('delete/(:num)', 'Produk::delete/$1');
});

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ====================================================================
// RUTE HALAMAN CUSTOMER / USER (FRONTEND)
// ====================================================================

// Halaman Utama User (Katalog Produk)
$routes->get('/', 'user\Shop::index');
$routes->get('/shop/detail/(:num)', 'user\Shop::detail/$1');

// Fitur Keranjang & Checkout (Wajib Login dengan filter 'login')
$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->post('/cart/add', 'user\Cart::add');
    $routes->get('/cart', 'user\Cart::index');
    $routes->get('/cart/remove/(:segment)', 'user\Cart::remove/$1');
    $routes->post('/checkout', 'user\Cart::checkout');

    // Riwayat Transaksi
    $routes->get('/riwayat', 'user\Shop::riwayat');
});


// ====================================================================
// RUTE HALAMAN ADMIN (BACKEND)
// ====================================================================

// Dashboard Admin (Wajib Login dengan filter 'login')
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);

// Manajemen Produk
$routes->group('produk', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'Produk::index');

    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');

    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');

    $routes->delete('delete/(:num)', 'Produk::delete/$1');
});

// Manajemen Transaksi
$routes->group('transaksi', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'Transaksi::index');

    $routes->post('store', 'Transaksi::store');

    $routes->get('edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('update/(:num)', 'Transaksi::update/$1');

    $routes->delete('delete/(:num)', 'Transaksi::delete/$1');
});

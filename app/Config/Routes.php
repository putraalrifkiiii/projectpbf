<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ====================================================================
// RUTE FRONTEND (USER)
// ====================================================================

$routes->get('/', 'User\Shop::index');
$routes->get('shop/detail/(:num)', 'User\Shop::detail/$1');

// Fitur yang butuh login (User Biasa)
$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->post('cart/add', 'User\Cart::add');
    $routes->get('cart', 'User\Cart::index');
    $routes->get('cart/remove/(:segment)', 'User\Cart::remove/$1');
    $routes->post('cart/checkout', 'User\Cart::checkout');
    $routes->get('cart/success/(:num)', 'User\Cart::success/$1');
    $routes->get('riwayat', 'User\Shop::riwayat');
    $routes->get('profil', 'User\Profile::index');
    $routes->post('profil/update', 'User\Profile::update');
});


// ====================================================================
// RUTE BACKEND (ADMIN) - namespace App\Controllers\Admin
// ====================================================================

$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Produk (Manual agar aman)
    $routes->get('produk', 'Produk::index');
    $routes->get('produk/create', 'Produk::create');
    $routes->post('produk/store', 'Produk::store');
    $routes->get('produk/edit/(:num)', 'Produk::edit/$1');
    $routes->post('produk/update/(:num)', 'Produk::update/$1');
    $routes->delete('produk/delete/(:num)', 'Produk::delete/$1');

    // Transaksi (Manual)
    // Transaksi (Manual)
    $routes->get('transaksi', 'Transaksi::index');
    $routes->post('transaksi/store', 'Transaksi::store'); // <-- TAMBAHKAN BARIS INI
    $routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
    $routes->delete('transaksi/delete/(:num)', 'Transaksi::delete/$1');
});

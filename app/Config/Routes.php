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

// ====================================================================
// MIDTRANS NOTIFICATION / CALLBACK
// Harus di luar filter login/admin agar bisa diakses Midtrans
// ====================================================================

$routes->post('midtrans/notification', 'User\Cart::notification');

// ====================================================================
// FITUR USER YANG BUTUH LOGIN
// ====================================================================

$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->post('cart/add', 'User\Cart::add');
    $routes->get('cart', 'User\Cart::index');
    $routes->get('cart/remove/(:segment)', 'User\Cart::remove/$1');
    $routes->post('cart/checkout', 'User\Cart::checkout');
    $routes->get('cart/success/(:num)', 'User\Cart::success/$1');

    $routes->get('riwayat', 'User\Shop::riwayat');
    $routes->get('user/transaksi/invoice/(:num)', 'User\Shop::invoice/$1');

    $routes->get('profil', 'User\Profile::index');
    $routes->post('profil/update', 'User\Profile::update');
});

// ====================================================================
// RUTE BACKEND (ADMIN) - namespace App\Controllers\Admin
// ====================================================================
$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Dashboard & Auth
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('logout', 'Dashboard::logout'); // <-- INI YANG KURANG COK

    // Produk
    $routes->get('produk', 'Produk::index');
    $routes->get('produk/create', 'Produk::create');
    $routes->post('produk/store', 'Produk::store');
    $routes->get('produk/edit/(:num)', 'Produk::edit/$1');
    $routes->post('produk/update/(:num)', 'Produk::update/$1');
    $routes->delete('produk/delete/(:num)', 'Produk::delete/$1');

    // Pelanggan
    $routes->get('pelanggan', 'Pelanggan::index');
    $routes->get('pelanggan/create', 'Pelanggan::create');
    $routes->post('pelanggan/store', 'Pelanggan::store');
    $routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1');
    $routes->delete('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

    // Transaksi
    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/detail/(:num)', 'Transaksi::detail/$1');
    $routes->get('transaksi/invoice/(:num)', 'Transaksi::invoice/$1');
    $routes->post('transaksi/store', 'Transaksi::store');
    $routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
    $routes->delete('transaksi/delete/(:num)', 'Transaksi::delete/$1');
});

// Rute logout untuk User Frontend
$routes->get('/logout', '\Myth\Auth\Controllers\AuthController::logout');
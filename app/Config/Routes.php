<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ====================================================================
// RUTE HALAMAN CUSTOMER / USER (FRONTEND)
// ====================================================================

// Halaman Utama User (Katalog Produk)
$routes->get('/', 'User\Shop::index');
$routes->get('/shop/detail/(:num)', 'User\Shop::detail/$1');

// Fitur Keranjang, Checkout & Profil (Wajib Login)
$routes->group('', ['filter' => 'login'], function ($routes) {
    // Keranjang & Pembayaran
    $routes->post('/cart/add', 'User\Cart::add');
    $routes->get('/cart', 'User\Cart::index');
    $routes->get('/cart/remove/(:segment)', 'User\Cart::remove/$1');
    $routes->post('/cart/checkout', 'User\Cart::checkout');

    // PERBAIKAN: Rute success dimasukkan ke dalam grup wajib login agar aman
    $routes->get('/cart/success/(:num)', 'User\Cart::success/$1');

    // Riwayat Transaksi
    $routes->get('/riwayat', 'User\Shop::riwayat');

    // Profil User
    $routes->get('/profil', 'User\Profile::index');
    $routes->post('/profil/update', 'User\Profile::update');
});


// ====================================================================
// RUTE HALAMAN ADMIN (BACKEND)
// ====================================================================

// PERBAIKAN: Gunakan filter 'role:admin' agar user biasa tidak bisa masuk
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:admin']);

// Manajemen Produk
$routes->group('produk', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/', 'Produk::index');
    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');
    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');
    $routes->delete('delete/(:num)', 'Produk::delete/$1');
});

// Manajemen Transaksi
$routes->group('transaksi', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->post('store', 'Transaksi::store');
    $routes->get('edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('update/(:num)', 'Transaksi::update/$1');
    $routes->delete('delete/(:num)', 'Transaksi::delete/$1');
});

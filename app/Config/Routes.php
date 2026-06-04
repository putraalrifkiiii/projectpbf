<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Dashboard
$routes->get('/', function () {
    return redirect()->to('/dashboard');
});

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);


// ==================== PRODUK ====================
$routes->group('produk', ['filter' => 'login'], function ($routes) {

    $routes->get('/', 'Produk::index');

    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');

    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');

    $routes->delete('delete/(:num)', 'Produk::delete/$1');
});


// ==================== TRANSAKSI ====================
$routes->group('transaksi', ['filter' => 'login'], function ($routes) {

    $routes->get('/', 'Transaksi::index');

    $routes->post('store', 'Transaksi::store');

    $routes->get('edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('update/(:num)', 'Transaksi::update/$1');

    $routes->delete('delete/(:num)', 'Transaksi::delete/$1');
});
// ====================================================================
// 2. ROUTE KHUSUS USER / PELANGGAN
// ====================================================================
// Filter opsional, misal kalau mau akses katalog harus login: ['filter' => 'userAuth']
$routes->group('user', ['namespace' => 'App\Controllers\User'], function ($routes) {

    // Method GET untuk menampilkan etalase toko
    $routes->get('shop', 'ShopController::index');
    $routes->get('shop/detail/(:num)', 'ShopController::detail/$1');

    // Nanti kalau ada fitur tambah ke keranjang, pastikan pakai POST
    // $routes->post('cart/add', 'CartController::add');
});

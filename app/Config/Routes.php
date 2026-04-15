<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/layout', 'Layout::index' );
$routes->get('/tugas', 'ProjectController::tampilkanSemuaData');
$routes->get('/tugas/(:num)', 'ProjectController::tampilkanBerdasarkanJenis/$1');
$routes->get('/tugas', 'ProjectController::tambahData');  //Harusnya POST
$routes->get('/mahasiswa-prodi', 'ProjectController::tampilkanMahasiswaProdi');
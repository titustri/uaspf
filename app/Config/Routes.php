<?php

use CodeIgniter\Router\RouteCollection;
// use App\Controllers\Dashboard;
// use App\Controllers\Transaksi;
/**
 * @var RouteCollection $routes
 */
// Request GET
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('addtransaksi', 'Transaksi::index');
$routes->get('barang', 'Transaksi::barang');
$routes->get('bayar', 'Bayar::index');
$routes->get('detail', 'Dashboard::detail');

// Request POST
$routes->post('addtransaksi', 'Transaksi::tambah');
$routes->post('bayar', 'Bayar::bayar');
$routes->post('cancel', 'Transaksi::cancel');
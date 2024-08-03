<?php

use CodeIgniter\Router\RouteCollection;
// use App\Controllers\Dashboard;
// use App\Controllers\Transaksi;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('addtransaksi', 'Transaksi::index');
$routes->get('barang', 'Transaksi::barang');
$routes->get('bayar', 'Bayar::index');

$routes->post('addtransaksi', 'Transaksi::tambah');

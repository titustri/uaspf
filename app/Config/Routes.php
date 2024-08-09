<?php

use CodeIgniter\Router\RouteCollection;
// use App\Controllers\Dashboard;
// use App\Controllers\Transaksi;
/**
 * @var RouteCollection $routes
 */
// Request GET
$routes->get('login', 'Login::index');
$routes->get('logout', 'Login::logout');
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('addtransaksi', 'Transaksi::index');
$routes->get('barang', 'Transaksi::barang');
$routes->get('bayar', 'Bayar::index');
$routes->get('proses-bayar/(:num)/(:num)', 'Bayar::bayar/$1/$2');
$routes->get('detail/(:num)', 'Transaksi::detail/$1');
$routes->get('cancel/(:num)', 'Transaksi::cancel/$1');
$routes->get('hapus/(:num)', 'Transaksi::hapus/$1');

// Request POST
$routes->post('proses-login', 'Login::proses_login');
$routes->post('addtransaksi', 'Transaksi::tambah');
$routes->post('cek-member', 'Transaksi::cek_member');
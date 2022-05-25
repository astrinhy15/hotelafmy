<?php

namespace Config;

use App\Controllers\Saya;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->post('/', 'Home::index');
//$routes->get('/kamar', 'Home::kamar');
$routes->get('/fasilitas', 'Home::fasilitas');
//$routes->get('/reservasi', 'Home::reservasi');
//$routes->post('/reservasi', 'Home::reservasi');
//$routes->get('/reservasi/print', 'Home::print');
$routes->get('/inv/(:num)', 'ReservasiController::invoice/$1');
$routes->get('/inv/', 'ReservasiController::index');
//$routes->get('/inv/kembali', 'ReservasiController::kembaliinv');
$routes->get('/cekin', 'Home::cari');
$routes->post('/cekout', 'Home::cari');

$routes->get('/petugas', 'PetugasController::index');
$routes->post('/login', 'PetugasController::login');
$routes->get('/petugas/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);
// $routes->get('/petugas/dashboard', 'Dashboardpetugas::dashboard_petugas', ['filter' => 'otentifikasi']);



//route CRUD Kamar
$routes->get('/kamar', 'PetugasController::tampilKamar');
$routes->get('/kamar/tambah', 'PetugasController::tambahKamar');
$routes->post('/kamar/simpan', 'PetugasController::simpanKamar');
$routes->get('/kamar/edit/(:num)', 'PetugasController::editKamar/$1');
$routes->post('/kamar/update', 'PetugasController::updateKamar');
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapusKamar/$1');

//CRUD FASILITAS KAMAR
$routes->get('/fasilitas/tampil', 'FasilitasController::tampilFasilitas');
$routes->get('/fasilitas/tambah', 'FasilitasController::tambahFasilitas');
$routes->post('/fasilitas/simpan', 'FasilitasController::simpanFasilitas');
$routes->get('/fasilitas/edit/(:num)', 'FasilitasController::editFasilitas/$1');
$routes->post('/fasilitas/update', 'FasilitasController::updateFasilitas');
$routes->get('/fasilitas/hapus/(:num)', 'FasilitasController::hapusFasilitas/$1');

//CRUD FASILITAS HOTEL
$routes->get('/fasilitashotel/tampil', 'FasilitasHotelController::tampilFasilitasHotel');
$routes->get('/fasilitashotel/tambah', 'FasilitasHotelController::tambahFasilitasHotel');
$routes->post('/fasilitashotel/simpan', 'FasilitasHotelController::simpanFasilitasHotel');
$routes->get('/fasilitashotel/edit/(:num)', 'FasilitasHotelController::editFasilitasHotel/$1');
$routes->get('/fasilitashotel/edit/foto/(:num)', 'FasilitasHotelController::editFoto/$1');
$routes->post('/fasilitashotel/update', 'FasilitasHotelController::updateFasilitasHotel');
$routes->post('/fasilitashotel/update/foto', 'FasilitasHotelController::updateFoto');
$routes->get('/fasilitashotel/hapusfasilitashotel/(:num)', 'FasilitasHotelController::hapusFasilitasHotel/$1');

//ROUTES RESEPSIONIS
$routes->get('/resepsionis/dashboard', 'ReservasiController::index');
$routes->get('/reservasi/tampilreservasi', 'ReservasiController::tampil_reservasi');
//$routes->get('/reservasi/cekin', 'ReservasiController::cekin/$1', ['filter' => 'otentifikasi']);
//$routes->get('/reservasi/cekout', 'ReservasiController::cekout/$1', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/petugas', 'ReservasiController::index', ['filter' => 'otentifikasi']);
$routes->post('/reservasi/petugas', 'ReservasiController::index', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/edit/(:num)', 'ReservasiController::edit/$1', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/in/(:num)', 'ReservasiController::in/$1', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/out/(:num)', 'ReservasiController::out/$1', ['filter' => 'otentifikasi']);
$routes->post('/reservasi/out', 'ReservasiController::out', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/hapus/(:num)', 'ReservasiController::hapusreservasi/$1');

// Untuk memesan kamar
$routes->get('/pemesanan', 'FormPemesanan::index');
$routes->post('/simpan-pemesanan', 'FormPemesanan::simpan');

// Tipe Kamar
$routes->get('/tipe-kamar/tambah', 'TipeKamarController::tambahTipeKamar');
$routes->get('/tipe-kamar/tampil', 'TipeKamarController::tampilTipeKamar');
$routes->post('/tipe-kamar/simpan', 'TipeKamarController::simpanTipeKamar');
$routes->get('/tipe-kamar/hapus/(:num)', 'TipeKamarController::hapusTipeKamar/$1');
$routes->get('/tipe-kamar/edit/(:num)', 'TipeKamarController::editTipeKamar/$1');
$routes->get('/tipe-kamar/edit/foto/(:num)', 'TipeKamarController::editFoto/$1');
$routes->post('/tipe-kamar/update', 'TipeKamarController::updateTipeKamar');
$routes->post('/tipe-kamar/update/foto', 'TipeKamarController::updateFoto');

//percobaan tipe kamar
//$routes->get('/percobaan/(:alpha)/umur/(:num)', 'TipeKamarController::percobaan/$2/$1');
$routes->get('/astri/umur/(:num)/desa/(:alpha)', 'Saya::astri/$1/$2');

/*
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

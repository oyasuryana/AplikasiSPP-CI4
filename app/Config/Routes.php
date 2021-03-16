<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/petugas', 'PetugasController::index');
$routes->get('/petugas/tampil', 'PetugasController::tampilPetugas');
$routes->get('/petugas/tambah', 'PetugasController::tambahPetugas');
$routes->post('/petugas/simpan', 'PetugasController::simpanPetugas');
$routes->get('/petugas/edit/(:num)', 'PetugasController::editPetugas/$1');
$routes->post('/petugas/update', 'PetugasController::updatePetugas');
$routes->get('/petugas/hapus/(:num)', 'PetugasController::hapusPetugas/$1');

$routes->post('/login', 'PetugasController::login');
$routes->get('/petugas/logout', 'PetugasController::logout');

$routes->get('/petugas/dashboard', 'Dashboardpetugas::index',['filter'=>'otentifikasi']);
$routes->get('/siswa', 'Siswa::index',['filter'=>'otentifikasi']);
$routes->get('/siswa/tambah', 'Siswa::tambahSiswa',['filter'=>'otentifikasi']);



$routes->get('/spp', 'Spp::index',['filter'=>'otentifikasi']);
$routes->get('/spp/tambah', 'Spp::tambahSpp',['filter'=>'otentifikasi']);
$routes->post('/spp/simpan', 'Spp::simpanSpp',['filter'=>'otentifikasi']);
$routes->get('/spp/edit/(:num)', 'Spp::EditSpp/$1',['filter'=>'otentifikasi']);
$routes->post('/spp/update', 'Spp::updateSpp',['filter'=>'otentifikasi']);
$routes->get('/spp/hapus/(:num)', 'Spp::hapusSpp/$1',['filter'=>'otentifikasi']);


$routes->get('/kelas', 'Kelas::index',['filter'=>'otentifikasi']);
$routes->get('/kelas/tambah', 'Kelas::tambahKelas',['filter'=>'otentifikasi']);
$routes->post('/kelas/simpan', 'Kelas::simpanKelas',['filter'=>'otentifikasi']);
$routes->get('/kelas/edit/(:num)', 'Kelas::editKelas/$1',['filter'=>'otentifikasi']);
$routes->post('/kelas/update', 'Kelas::updateKelas',['filter'=>'otentifikasi']);
$routes->get('/kelas/hapus/(:num)', 'Kelas::hapusKelas/$1',['filter'=>'otentifikasi']);

/*
 * --------------------------------------------------------------------
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

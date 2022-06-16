<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/data', 'Data::index');
$routes->get('/supplier', 'Data::supplier');
$routes->get('/pasien', 'Data::pasien');
$routes->get('/dokter', 'Data::dokter');
$routes->get('/rumahsakit', 'Data::rumahsakit');
$routes->get('/asuransi', 'Data::asuransi');
$routes->get('/sales', 'Data::sales');
$routes->get('/dokterspesialis', 'Data::dokterspesialis');


$routes->get('/Obat', 'Medicine::index');

$routes->post('/tambahObat', 'Medicine::tambahObat');
$routes->get('/Obat/Tambah', 'Medicine::halamanTambahObat');
$routes->get('/Obat/Kategori', 'Medicine::halamanKategoriObat');
$routes->get('/Obat/Tipe', 'Medicine::halamanTipeObat');

$routes->post('/Obat/Cari', 'Medicine::cariObat');

$routes->get('/delObat/(:num)', 'Medicine::hapusObat/$1');
$routes->get('/updateObat/(:num)', 'Medicine::halamanUpdateObat/$1');

$routes->post('/Update', 'Medicine::updateObat');

$routes->post('/updObat/(:num)', 'Medicine::UpdateObat/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login/loginAuth', 'Login::loginAuth');
$routes->get('/logout', 'Login::logout');

$routes->get('/persediaan/opname', 'persediaan::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

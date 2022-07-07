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

//supplier
$routes->get('/supplier', 'Data::supplier');
$routes->get('/hapus_supplier/(:num)', 'Data::hapus_supplier/$1');
$routes->get('/editsupplier/(:num)', 'Data::halamanUpdateSupplier/$1');
$routes->post('/updateSupplier/(:num)', 'Data::UpdateSupplier/$1');
$routes->post('/tambahSupplier', 'Data::tambahSupplier');

//dokter
$routes->get('/dokter', 'Data::dokter');
$routes->get('/hapus_dokter/(:num)', 'Data::hapus_dokter/$1');
$routes->post('/tambahDokter', 'Data::tambahDokter');
$routes->get('/editdokter/(:num)', 'Data::halamanUpdateDokter/$1');
$routes->post('/updateDokter/(:num)', 'Data::UpdateDokter/$1');

//pasien
$routes->get('/pasien', 'Data::pasien');
$routes->get('/hapus_pasien/(:num)', 'Data::hapus_pasien/$1');
$routes->post('/tambahPasien', 'Data::tambahPasien');
$routes->get('/editpasien/(:num)', 'Data::halamanUpdatePasien/$1');
$routes->post('/updatePasien/(:num)', 'Data::UpdatePasien/$1');

//rumahsakit
$routes->get('/hapus_rumahsakit/(:num)', 'Data::hapus_rumahsakit/$1');
$routes->get('/rumahsakit', 'Data::rumahsakit');
$routes->post('/tambahRumahsakit', 'Data::tambahRumahsakit');
$routes->get('/editrumahsakit/(:num)', 'Data::halamanUpdateRumahsakit/$1');
$routes->post('/updateRumahsakit/(:num)', 'Data::UpdateRumahsakit/$1');

//============================================================================


$routes->get('/Obat', 'Medicine::index');

$routes->post('/tambahObat', 'Medicine::tambahObat');
$routes->get('/Obat/Tambah', 'Medicine::halamanTambahObat');
$routes->get('/Obat/Kategori', 'Medicine::halamanKategoriObat');
$routes->get('/Obat/Tipe', 'Medicine::halamanTipeObat');
$routes->get('/Obat/Satuan', 'Medicine::halamanSatuanObat');

$routes->get('/Obat/Kategori/Tambah', 'Medicine::halamanTambahKategoriObat');
$routes->post('/tambahKategoriObat', 'Medicine::tambahKategoriObat');
$routes->get('/delKategoriObat/(:num)', 'Medicine::hapusKategoriObat/$1');
$routes->get('/updateKategoriObat/(:num)', 'Medicine::halamanUpdateKategoriObat/$1');
$routes->post('/updKategoriObat/(:num)', 'Medicine::UpdateKategoriObat/$1');
$routes->post('/Obat/Kategori/Cari', 'Medicine::cariKategoriObat');

$routes->get('/Obat/Tipe/Tambah', 'Medicine::halamanTambahTipeObat');
$routes->post('/tambahTipeObat', 'Medicine::tambahTipeObat');
$routes->get('/delTipeObat/(:num)', 'Medicine::hapusTipeObat/$1');
$routes->get('/updateTipeObat/(:num)', 'Medicine::halamanUpdateTipeObat/$1');
$routes->post('/updTipeObat/(:num)', 'Medicine::UpdateTipeObat/$1');
$routes->post('/Obat/Tipe/Cari', 'Medicine::cariTipeObat');

$routes->get('/Obat/Satuan/Tambah', 'Medicine::halamanTambahSatuanObat');
$routes->post('/tambahSatuanObat', 'Medicine::tambahSatuanObat');
$routes->get('/delSatuanObat/(:num)', 'Medicine::hapusSatuanObat/$1');
$routes->get('/updateSatuanObat/(:num)', 'Medicine::halamanUpdateSatuanObat/$1');
$routes->post('/updSatuanObat/(:num)', 'Medicine::UpdateSatuanObat/$1');
$routes->post('/Obat/Satuan/Cari', 'Medicine::cariSatuanObat');

$routes->post('/Obat/Cari', 'Medicine::cariObat');

$routes->get('/delObat/(:num)', 'Medicine::hapusObat/$1');
$routes->get('/updateObat/(:num)', 'Medicine::halamanUpdateObat/$1');

$routes->post('/Update', 'Medicine::updateObat');

$routes->post('/updObat/(:num)', 'Medicine::UpdateObat/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login/loginAuth', 'Login::loginAuth');
$routes->get('/logout', 'Login::logout');

$routes->get('/persediaan/opname', 'Persediaan::index');
$routes->post('/persediaan/opname', 'Persediaan::index');
// $routes->post('/persediaan/getOpname', 'Persediaan::getOpname');
$routes->get('/persediaan/pHarga', 'Persediaan::penyesuaianHarga');
$routes->post('/persediaan/pHarga', 'Persediaan::penyesuaianHarga');
// $routes->post('/persediaan/getPHarga', 'Persediaan::getPHarga');
$routes->post('/persediaan/updateHarga', 'Persediaan::updateHarga');
$routes->get('/persediaan/dataExp', 'Persediaan::dataExp');
$routes->post('/persediaan/dataExp', 'Persediaan::dataExp');
// $routes->post('/persediaan/getDataExp', 'Persediaan::getDataExp');
$routes->get('/persediaan/pStock', 'Persediaan::penyesuaianStok');
$routes->post('/persediaan/pStock', 'Persediaan::penyesuaianStok');
// $routes->post('/persediaan/getPStock', 'Persediaan::getPStock');
$routes->post('/persediaan/updateStock', 'Persediaan::updateStock');
$routes->get('/persediaan/itemIn', 'Persediaan::itemIn');
$routes->post('/persediaan/itemIn', 'Persediaan::itemIn');
// $routes->post('/persediaan/getItemIn', 'Persediaan::getItemIn');
$routes->get('/persediaan/itemOut', 'Persediaan::itemOut');
$routes->post('/persediaan/itemOut', 'Persediaan::itemOut');
// $routes->post('/persediaan/getItemOut', 'Persediaan::getItemOut');

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

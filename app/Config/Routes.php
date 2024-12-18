<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/meteorologi', 'Pengamatan::meteorologi');
$routes->get('/curah-hujan', 'Pengamatan::hujan');
$routes->get('/penguapan', 'Pengamatan::penguapan');
$routes->get('/penyinaran-matahari', 'Pengamatan::matahari');
$routes->get('/monitoring-laporan', 'Monitoring::monitoring');
$routes->get('/report-laporan', 'Report::report');
$routes->post('/report-laporan', 'Report::report');

$routes->get('generate-pdf', 'PdfController::generatePdf');


$routes->group('monitoring-laporan', function ($routes) {
	$routes->get('data-meteorologi', 'Monitoring::meteorologi');
	$routes->post('data-meteorologi', 'Monitoring::meteorologi');
	$routes->get('data-curah-hujan', 'Monitoring::hujan');
	$routes->post('data-curah-hujan', 'Monitoring::hujan');
	$routes->get('data-penguapan', 'Monitoring::penguapan');
	$routes->post('data-penguapan', 'Monitoring::penguapan');
	$routes->get('data-penyinaran-matahari', 'Monitoring::matahari');
	$routes->post('data-penyinaran-matahari', 'Monitoring::matahari');
	$routes->get('data-meteorologi', 'Monitoring::administrator');

});
///report-report/download/8
$routes->group('report-laporan', function ($routes) {
	$routes->get('download/(:segment)', 'Report::downloadreport/$1');
	$routes->get('data-meteorologi', 'Report::meteorologi');
	$routes->get('data-curah-hujan', 'Report::hujan');
	$routes->get('data-penguapan', 'Report::penguapan');
	$routes->get('data-penyinaran-matahari', 'Report::matahari');
	$routes->get('data-meteorologi', 'Report::administrator');

});

$routes->group('administrator', function ($routes) {
	$routes->get('/', 'Beranda::administrator');
	$routes->get('kelola-pengguna', 'User::monitoring');
	$routes->get('(:segment)/delete', 'User::delete/$1');

});

$routes->group('observer', function ($routes) {
	$routes->get('/', 'Beranda::observer');
	
});







//


//

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

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
$routes->setDefaultController('Store');
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
$routes->get('/', 'Store::index');
$routes->get('/dashboard', 'Home::index', ['filter' => 'auth']);

//custom routes
$routes->get('category/(:segment)', 'Store::category/$1');
$routes->get('/master/kategori', 'ItemBase::category', ['filter' => 'auth']);
$routes->get('/master/kategori/(:segment)/delete', 'ItemBase::delete_category/$1', ['filter' => 'auth']);
$routes->post('/master/kategori/save', 'ItemBase::add_category', ['filter' => 'auth']);

$routes->get('/master/supplier', 'ItemBase::supplier', ['filter' => 'auth']);
$routes->get('/master/supplier/add', 'ItemBase::add_supplier', ['filter' => 'auth']);
$routes->get('/master/supplier/(:segment)/detail', 'ItemBase::detail_supplier/$1', ['filter' => 'auth']);
$routes->get('/master/supplier/(:segment)/delete', 'ItemBase::delete_supplier/$1', ['filter' => 'auth']);
$routes->post('/master/supplier/save', 'ItemBase::save_supplier', ['filter' => 'auth']);

$routes->get('/master/user', 'ItemBase::user', ['filter' => 'auth']);
$routes->get('/master/user/add', 'ItemBase::add_user', ['filter' => 'auth']);
$routes->get('/master/user/(:segment)/detail', 'ItemBase::detail_user/$1', ['filter' => 'auth']);
$routes->get('/master/user/(:segment)/delete', 'ItemBase::delete_user/$1', ['filter' => 'auth']);
$routes->post('/master/user/save', 'ItemBase::save_user', ['filter' => 'auth']);

$routes->get('/master/barang', 'ItemBase::item', ['filter' => 'auth']);
$routes->get('/master/barang/add', 'ItemBase::add_item', ['filter' => 'auth']);
$routes->get('/master/barang/(:segment)/detail', 'ItemBase::detail_item/$1', ['filter' => 'auth']);
$routes->get('/master/barang/(:segment)/delete', 'ItemBase::delete_item/$1', ['filter' => 'auth']);
$routes->post('/master/barang/save', 'ItemBase::save_item', ['filter' => 'auth']);

$routes->get('/master/harga', 'PriceList::index', ['filter' => 'auth']);
$routes->get('/master/harga/item/(:segment)', 'PriceList::priceItem/$1', ['filter' => 'auth']);
$routes->post('/master/harga/save', 'PriceList::save', ['filter' => 'auth']);

$routes->get('/report/stock', 'Report::stock', ['filter' => 'auth']);
$routes->get('/report/penerimaan', 'Report::report_inbound', ['filter' => 'auth']);
$routes->get('/report/penjualan', 'Report::report_outbound', ['filter' => 'auth']);
$routes->post('/report/penerimaan', 'Report::report_inbound', ['filter' => 'auth']);
$routes->post('/report/penjualan', 'Report::report_outbound', ['filter' => 'auth']);

$routes->post('/trans/inbound/preview', 'Inbound::save', ['filter' => 'auth']);
$routes->post('/trans/outbound/preview', 'Outbound::save', ['filter' => 'auth']);
$routes->get('/trans/inbound/add', 'Inbound::add', ['filter' => 'auth']);
$routes->get('/trans/outbound/add', 'Outbound::add', ['filter' => 'auth']);
$routes->get('/trans/inbound', 'Inbound::index', ['filter' => 'auth']);
$routes->get('/trans/outbound', 'Outbound::index', ['filter' => 'auth']);
$routes->get('/trans/inbound/(:segment)/detail', 'Inbound::detail/$1', ['filter' => 'auth']);
$routes->get('/trans/outbound/(:segment)/detail', 'Outbound::detail/$1', ['filter' => 'auth']);

$routes->post('/auth/verify', 'Auth::auth');


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

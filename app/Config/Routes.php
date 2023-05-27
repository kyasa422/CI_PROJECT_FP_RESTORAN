<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Authentication::index');
$routes->post('/regist', 'Authentication::register');
$routes->post('/check', 'Authentication::check');
$routes->get('/dashboard', 'UserController::dashboard');
$routes->get('/logout', 'Authentication::logout');
$routes->get('/login', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->get('/product', 'ProductController::index');
$routes->get('/product/create', 'ProductController::create');
$routes->get('/product/index', 'ProductController::index');
$routes->post('/product/store', 'ProductController::store');
$routes->get('/product/edit/(:segment)', 'ProductController::edit/$1');
$routes->post('/product/delete/(:segment)', 'ProductController::destroy/$1');
$routes->post('/product/update', 'ProductController::update');
$routes->get('/product/(:segment)', 'ProductController::show/$1');
$routes->get('login/', 'UserController::logout');
$routes->get('/transaksi/detail/(:segment)', 'UserController::create/$1');
$routes->post('/transaksi/save', 'UserController::save');
$routes->get('/transaksi/history', 'TransaksiController::history');
$routes->get('/transaksi/printpdf', 'TransaksiController::printpdf');






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

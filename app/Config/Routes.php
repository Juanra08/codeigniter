<?php

namespace Config;

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
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/* namespaces */


if(!defined('ADMIN_NAMESPACE'))define('ADMIN_NAMESPACE',"App\Controllers\Administration") ;

if(!defined('PUBLIC_NAMESPACE'))define('PUBLIC_NAMESPACE',"App\Controllers\PublicSection") ;

if(!defined('REST_NAMESPACE'))define('REST_NAMESPACE',"App\Controllers\Rest") ;


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/prueba', 'PruebaController::index',['as' => "prueba_page"]);
$routes->get('/parametro/(:any)', 'PruebaController::parametro/$1');

$routes->get('/contacto', 'PruebaController::contacto',['as' => "contacto_page"]);

$routes->group("",function ($routes){
    $routes->get('/', 'LoginController::index',['as' => "login",'filter' => 'login_auth',"namespace" => PUBLIC_NAMESPACE]);
    $routes->post('login', 'LoginController::login',['as' => "login_ajax","namespace" => PUBLIC_NAMESPACE]);
    $routes->get('home', 'HomeController::index',['as' => "home",'filter' => 'public_auth',"namespace" => PUBLIC_NAMESPACE]);
});

$routes->group("admin",function ($routes){
$routes->get('home', 'HomeController::index',['as' => "admin",'filter' => 'private_auth',"namespace" => ADMIN_NAMESPACE]);
$routes->get('festivals', 'FestivalsController::index', ['as' => 'festival_admin', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
$routes->get('categories', 'CategoriesController::index', ['as' => 'categories_admin', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
$routes->get('users', 'UsersController::index', ['as' => 'users_admin', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
$routes->get('roles', 'RolesController::index', ['as' => 'roles_admin', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
});

$routes->get('/pruebaAjax', 'PruebaController::pruebaAjax',['as' => "prueba_ajax"]);

//---------------datatables------------------

$routes->post('festivals_data', 'FestivalsController::getFestivalsData', ['as' => 'festivals_data', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);

//---------------Delete-----------------
$routes->delete('delete_festival', 'FestivalsController::deleteFestival', ['as' => 'delete_festival', 'namespace' => ADMIN_NAMESPACE]);

//--------------Crear/editar----------------

$routes->get('festivals/view/edit', 'FestivalsController::viewEditFestival', ['as' => 'festivals_view_edit', 'namespace' => ADMIN_NAMESPACE]);
$routes->get('festivals/view/edit/(:any)', 'FestivalsController::viewEditFestival/$1', ['as' => 'festivals_view_edit/1$', 'namespace' => ADMIN_NAMESPACE]);

$routes->post('festivals', 'FestivalsController::saveFestival', ['as' => 'festivals_save', 'namespace' => ADMIN_NAMESPACE]);

//ApiRest----------------------------------

$routes->group('rest', function ($routes) {
    $routes->get('categories/(:any)', 'CategoriesController::getCategories/$1', ['namespace' => REST_NAMESPACE]);
    $routes->get('categories', 'CategoriesController::getCategories', ['namespace' => REST_NAMESPACE]);
    $routes->delete('categories', 'CategoriesController::deleteCategories', ['namespace' => REST_NAMESPACE]);
    $routes->post('categories', 'CategoriesController::saveCategories', ['namespace' => REST_NAMESPACE]);
});

//-----------------------------------------


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

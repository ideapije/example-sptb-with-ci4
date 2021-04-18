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
$routes->setDefaultController('ProjectController');
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
$routes->get('/', 'ProjectController::index');
$routes->get('/export/docs', 'ProjectController::exportToDocs', ['as' => 'projects.export.docs']);

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->add('projects/tables', 'Projects::tables', ['as' => 'api.projects.tables']);
    $routes->add('projects/dummy', 'Projects::dummy', ['as' => 'api.projects.dummy']);
});

$routes->get('sptb-datatable', 'Sptb::sptbDatatable');

$routes->group('projects', function ($routes) {
    $routes->get('new', 'ProjectController::new', ['as' => 'projects.new']);
    $routes->post('/', 'ProjectController::create', ['as' => 'projects.create']);
    $routes->get('/', 'ProjectController::index', ['as' => 'projects.index']);
    $routes->get('edit/(:num)', 'ProjectController::edit/$1', ['as' => 'projects.edit']);
    $routes->put('update/(:num)', 'ProjectController::update/$1', ['as' => 'projects.update']);
    $routes->delete('(:num)', 'ProjectController::delete/$1', ['as' => 'projects.delete']);
});

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

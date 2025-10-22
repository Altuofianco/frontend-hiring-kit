<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('clienti', function($routes){

    $routes->get('elenco', 'Customer::index');
    $routes->get('(:num)', 'Customer::show/$1');
    $routes->post('crea', 'Customer::create');
    $routes->post('modifica/(:num)', 'Customer::update/$1');
    $routes->delete('elimina/(:num)', 'Customer::delete/$1');

});

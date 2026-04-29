<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/list', 'EtudiantController::index');
$routes->get('/form', 'EtudiantController::form');
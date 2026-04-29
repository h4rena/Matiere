<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes publiques (login)
$routes->get('/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');

// Routes protégées
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/list', 'EtudiantController::notes', ['filter' => 'auth']);
$routes->get('/form', 'EtudiantController::form', ['filter' => 'auth:admin']);
$routes->post('/form', 'EtudiantController::saveNote', ['filter' => 'auth:admin']);
$routes->post('/auth/logout', 'Auth::logout', ['filter' => 'auth']);
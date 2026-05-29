<?php

use CodeIgniter\Router\RouteCollection;

$routes = service('routes');

$routes->get('/', 'Home::index');
$routes->get('/transfer', 'Transfer::index');
$routes->post('/transfer/submit', 'Transfer::submit');

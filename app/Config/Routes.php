<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->setAutoRoute(true);

$routes->get('admin/dashboard', 'Admin\Dashboard::index');

$routes->get('admin/user', 'Admin\User::index');






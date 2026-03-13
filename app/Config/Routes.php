<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('catalog', 'Catalog::index');
$routes->get('register', 'Register::index');
$routes->post('register/store', 'Register::store');
$routes->get('dashboard', 'UserDashboard::index');
$routes->post('dashboard/update', 'UserDashboard::updateProfile');
$routes->get('dashboard/delete', 'UserDashboard::deleteAccount');
$routes->get('home', 'Home::index');
$routes->get('cart', 'Cart::index');
$routes->get('products', 'Products::index');
$routes->get('products/details/(:num)', 'Products::details/$1');
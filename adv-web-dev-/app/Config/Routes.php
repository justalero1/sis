<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/students', 'Student::index');
$routes->get('/students/create', 'Student::create');
$routes->post('/students/store', 'Student::store');
$routes->get('/students/edit/(:num)', 'Student::edit/$1');
$routes->post('/students/update/(:num)', 'Student::update/$1');
$routes->post('/students/delete/(:num)', 'Student::delete/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/login/check', 'Auth::checkLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register');
$routes->post('/register/save', 'Auth::saveRegister');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/admin', 'Admin::index', ['filter' => 'auth,admin']);

$routes->resource('api/items', ['controller' => 'Api\ItemsController']);

$routes->get('/tasks', 'Task::index');
$routes->get('/tasks/create', 'Task::create');
$routes->post('/tasks/store', 'Task::store');
$routes->get('/tasks/delete/(:num)', 'Task::delete/$1');

$routes->resource('api/tasks', ['controller' => 'Api\TaskApi']);

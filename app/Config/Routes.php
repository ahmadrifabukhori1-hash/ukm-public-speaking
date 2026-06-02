<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public page
$routes->get('/', 'PendaftaranController::index');
$routes->post('daftar', 'PendaftaranController::store');

// Admin auth, jangan dikasih filter
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/login', 'Admin\AuthController::processLogin');
$routes->get('admin/logout', 'Admin\AuthController::logout');

// Admin dashboard, wajib login
$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    $routes->get('/', 'Admin\PendaftarController::index');

    $routes->get('pendaftar', 'Admin\PendaftarController::index');
    $routes->get('pendaftar/show/(:num)', 'Admin\PendaftarController::show/$1');
    $routes->get('pendaftar/create', 'Admin\PendaftarController::create');
    $routes->post('pendaftar/store', 'Admin\PendaftarController::store');
    $routes->get('pendaftar/edit/(:num)', 'Admin\PendaftarController::edit/$1');
    $routes->post('pendaftar/update/(:num)', 'Admin\PendaftarController::update/$1');
    $routes->post('pendaftar/delete/(:num)', 'Admin\PendaftarController::delete/$1');
});
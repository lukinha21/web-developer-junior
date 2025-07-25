<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Blog::index');
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');

$routes->match(['get', 'post'], 'admin/register', 'Admin\Auth::register');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('posts', 'Admin\PostController::index');
    $routes->get('posts/create', 'Admin\PostController::create');
    $routes->post('posts/store', 'Admin\PostController::store');
    $routes->get('posts/edit/(:num)', 'Admin\PostController::edit/$1');
    $routes->post('posts/update/(:num)', 'Admin\PostController::update/$1');
    $routes->get('posts/delete/(:num)', 'Admin\PostController::delete/$1');
    $routes->get('posts/show/(:num)', 'Admin\PostController::show/$1');
});
$routes->get('admin/dashboard', 'Admin\PostController::dashboard');

$routes->get('admin/dashboard', 'Admin\Dashboard::index', ['filter' => 'auth']);
$routes->get('admin/posts', 'Admin\PostController::index', ['filter' => 'auth']);

$routes->get('blog/todos', 'Blog::todos');
$routes->get('blog/(:segment)', 'Blog::show/$1');
$routes->get('blog', 'Blog::index');
$routes->get('blog/search', 'Blog::search');

$routes->get('search', 'Blog::search');



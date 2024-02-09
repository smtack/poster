<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Post;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('create', [Post::class, 'create']);
$routes->post('new', [Post::class, 'new']);
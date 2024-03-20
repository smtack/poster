<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Post;
use App\Controllers\User;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('post/(:num)', [Post::class, 'post']);

$routes->get('signup', [User::class, 'signup'], ['filter' => 'AuthenticatedFilter']);
$routes->post('register', [User::class, 'register'], ['filter' => 'AuthenticatedFilter']);

$routes->get('login', [User::class, 'login'], ['filter' => 'AuthenticatedFilter']);
$routes->post('authenticate', [User::class, 'authenticate'], ['filter' => 'AuthenticatedFilter']);

$routes->get('logout', [User::class, 'logout']);

$routes->get('profile/(:segment)', [User::class, 'profile']);

$routes->get('update-profile', [User::class, 'updateProfile'], ['filter' => 'GuestFilter']);
$routes->post('update-profile', [User::class, 'updateProfileData'], ['filter' => 'GuestFilter']);
$routes->post('change-password', [User::class, 'changePassword'], ['filter' => 'GuestFilter']);
$routes->post('delete-profile', [User::class, 'deleteProfile'], ['filter' => 'GuestFilter']);

$routes->get('create', [Post::class, 'create'], ['filter' => 'GuestFilter']);
$routes->post('new', [Post::class, 'new'], ['filter' => 'GuestFilter']);

$routes->get('edit/(:num)', [Post::class, 'edit'], ['filter' => 'GuestFilter']);
$routes->post('update/(:num)', [Post::class, 'update'], ['filter' => 'GuestFilter']);

$routes->get('delete/(:num)', [Post::class, 'delete'], ['filter' => 'GuestFilter']);
<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Router;
use App\Controller\HomeController;
use App\Controller\TodoController;
use App\Controller\UserController;

Router::add('GET', '/', HomeController::class, 'index', []);

Router::add('GET', '/users/register', UserController::class, 'register', []);
Router::add('POST', '/users/register', UserController::class, 'postRegister', []);
Router::add('GET', '/users/login', UserController::class, 'login', []);
Router::add('POST', '/users/login', UserController::class, 'postLogin', []);

Router::add('POST', '/todo/store', TodoController::class, 'store', []);
Router::add('GET', '/todo/([0-9]*)/delete', TodoController::class, 'delete', []);
Router::add('GET', '/todo/([0-9]*)/edit', TodoController::class, 'edit', []);
Router::add('POST', '/todo/update', TodoController::class, 'update', []);

Router::run();

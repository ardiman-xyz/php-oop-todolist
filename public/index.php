<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Router;
use App\Controller\UserController;

Router::add('GET', '/users/register', UserController::class, 'register', []);
Router::add('POST', '/users/register', UserController::class, 'postRegister', []);
Router::add('GET', '/users/login', UserController::class, 'login', []);

Router::run();

<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();
$authController = new AuthController();
$homeController = new HomeController();

$router->get('/', [$authController, 'login']);
$router->get('/login', [$authController, 'login']);
$router->get('/dashboard', [$homeController, 'index']);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'] ?? 'GET');

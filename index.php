<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();
$homeController = new HomeController();

$router->get('/', [$homeController, 'index']);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'] ?? 'GET');

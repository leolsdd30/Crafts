<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;

/**
 * Register all web routes here.
 * The $router object is provided by public/index.php
 */

// Basic test route to ensure the system is working
$router->get('/', function () {
    echo "<h1>CraftConnect is Alive!</h1><p>The MVC Router is working perfectly.</p>";
});

// Example of how we will add the real routes once their Controllers exist:
// $router->get('/', [HomeController::class, 'index']);
// $router->get('/login', [AuthController::class, 'showLoginForm']);
// $router->post('/login', [AuthController::class, 'processLogin']);
// $router->get('/logout', [AuthController::class, 'logout']);

<?php

// Define the absolute path to the root directory
define('BASE_PATH', dirname(__DIR__));

// Boot the core framework requirements
require BASE_PATH . '/bootstrap/app.php';

use App\Core\Router;

// Instantiate our custom router
$router = new Router();

// Load the defined web routes into the router
require BASE_PATH . '/routes/web.php';

// Dispatch the current request URL through the router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; // Support for fake PUT/DELETE form methods

$router->dispatch($uri, $method);

# Routes: Web

## Idea & Main Objective
The `web.php` file is a configuration file that simply lists every single URL available on the platform and tells the Router what to do when someone visits them.

## Purpose & Role
Acts as the central map/directory for the entire application. When adding a new page, developers come here first.

## Required Code & Logic
- Expects the `$router` object to be available (passed in from `public/index.php`).
- Example implementations:
  - `$router->get('/', [HomeController::class, 'index']);`
  - `$router->get('/login', [AuthController::class, 'showLoginForm']);`
  - `$router->post('/login', [AuthController::class, 'processLogin']);`
  - `$router->get('/craftsman/dashboard', [CraftsmanController::class, 'dashboard']);`

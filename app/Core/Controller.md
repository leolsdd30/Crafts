# Core: Controller

## Idea & Main Objective
The `Controller.php` acts as the base class that all other specific controllers (e.g., `AuthController`, `DashboardController`) will extend.

## Purpose & Role
To provide common helper methods to all controllers, primarily for rendering HTML views easily and redirecting the user.

## Required Code & Logic
- Method: `view($viewName, $data = [])`
  - Needs to extract the `$data` array into local variables using PHP's `extract()` function so the view files can use them directly (e.g., passing `['name' => 'John']` becomes `$name` in the HTML).
  - Needs to `require` the corresponding `.php` file from the `resources/views/` directory based on the `$viewName`.
- Method: `redirect($url)`
  - Uses PHP's `header("Location: " . $url)` to redirect the user and then calls `exit()`.

# Public: index

## Idea & Main Objective
The `index.php` file inside `/public` is the solitary point where all web traffic enters the application.

## Purpose & Role
Acts as the "Front Controller". It receives the URL, spins up the `.php` logic, and fires back the HTML view.

## Required Code & Logic
- Requires `/bootstrap/app.php`.
- Initializes the custom `app\Core\Router` class.
- Requires `/routes/web.php` to load all valid platform URLs into the router.
- Dispatches the router with `$_SERVER['REQUEST_URI']` to determine which controller to load.
- This is the *only* PHP file exposed directly to web browser requests.

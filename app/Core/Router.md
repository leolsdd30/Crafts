# Core: Router

## Idea & Main Objective
The `Router.php` class is responsible for directing incoming web requests to the correct controller method.

## Purpose & Role
It replaces the routing engine normally provided by a framework. It maps URLs (like `/login` or `/craftsmen/profile`) and HTTP Methods (GET, POST) to specific classes and methods.

## Required Code & Logic
- Property: An array to hold registered routes (e.g., `$routes = []`).
- Methods to register routes: `get($uri, $action)` and `post($uri, $action)`.
- Method to handle the request: `dispatch($uri, $method)`. 
- The `dispatch` method should:
  1. Look up the `$uri` in the `$routes` array.
  2. If found, instantiate the mapped Controller class and call the mapped method.
  3. If not found, load a custom `404 Not Found` view.

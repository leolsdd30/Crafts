# Controller: Home

## Idea & Main Objective
The `HomeController.php` is responsible for loading the public-facing landing pages of the platform.

## Purpose & Role
It acts as the glue between the URL (e.g., `/`) and the HTML view (`resources/views/public/home.php`), passing any necessary dynamic data (like "Top Rated Craftsmen") to the view.

## Required Code & Logic
- Extends the base `app\Core\Controller`.
- Method: `index()`
  - Calls `$this->view('public/home', ['title' => 'Welcome to CraftConnect']);`
- Method: `about()`
  - Calls `$this->view('public/about');`

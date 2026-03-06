# Auth: Middleware

## Idea & Main Objective
The `Middleware.php` class acts as the bouncer for the platform router.

## Purpose & Role
It runs *before* a page loads to ensure the user actually has permission to view it.

## Required Code & Logic
- `requireLogin()`: Redirects to login page if `$_SESSION['user_id']` is empty.
- `requireRole($allowed_role)`: For example, if a Homeowner tries to access `/craftsman/dashboard.php`, this intercepts and blocks it.
- CSRF Token verification mechanism (`verifyCsrfToken($_POST['csrf_token'])`).

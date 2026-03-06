# Controller: Auth

## Idea & Main Objective
The `AuthController.php` handles all user authentication workflows (Login, Registration, Logout).

## Purpose & Role
Replaces the single-action classes in `app/Auth/` by grouping all authentication logic into one cohesive class.

## Required Code & Logic
- Extends the base `app\Core\Controller`.
- Method: `showLoginForm()`
  - Calls `$this->view('auth/login');`
- Method: `processLogin()`
  - Reads `$_POST` data.
  - Validates credentials against the `users` table via the `User` model.
  - Sets `$_SESSION['user_id']` = `$user->id`. This is critical: it is the sole mechanism the rest of the app uses to know who is currently browsing and to populate fields like `homeowner_id`.
  - Redirects to the appropriate dashboard based on role.
- Method: `logout()`
  - Destroys the session and redirects to `/login`.

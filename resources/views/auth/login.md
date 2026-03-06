# View: Auth Login

## Idea & Main Objective
The `login.php` view provides the universal sign-in portal.

## Purpose & Role
Collects credentials to pass to the `Login.php` Auth Action safely.

## Required Code & Logic
- Uses Tailwind forms plugin for polished inputs.
- Displays `error` flash messages if authentication fails.
- A "Forgot Password" link.
- CSRF token hidden input.

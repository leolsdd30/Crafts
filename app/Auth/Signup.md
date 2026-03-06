# Auth: Signup

## Idea & Main Objective
The `Signup.php` class controls user registration for both Homeowners and Craftsmen.

## Purpose & Role
Strips malicious input, hashes the password safely, and saves the new identity.

## Required Code & Logic
- `register($data, $role)` method.
- Strict input sanitization (using `filter_var` and htmlspecialchars) to prevent XSS.
- Password hashing using `password_hash($data['password'], PASSWORD_DEFAULT)`.
- If `$role` is 'craftsman', this class also needs to trigger the creation of a blank `craftsmen_profiles` record.

# Auth: Login

## Idea & Main Objective
The `Login.php` class handles user authentication and session creation.

## Purpose & Role
Verifies identity securely against the database and establishes a valid PHP session.

## Required Code & Logic
- `authenticate($email, $password)` method.
- Checks the users table, then uses `password_verify()` against the secure hash.
- Sets `$_SESSION['user_id']` and `$_SESSION['role']`.
- Implementing basic Rate Limiting (locking the account temporarily after 5 failed attempts) to prevent brute-force attacks.

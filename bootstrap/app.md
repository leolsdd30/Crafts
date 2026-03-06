# Bootstrap: app

## Idea & Main Objective
The `app.php` file initializes the core underlying components of the framework before a request is fully processed.

## Purpose & Role
Sets up PHP autoloading, loads environment variables, and configures error reporting globally.

## Required Code & Logic
- `require_once __DIR__ . '/../vendor/autoload.php';`
- Loading `.env` via `vlucas/phpdotenv`.
- Instantiating global singletons (like the Logger or Database connection).
- Setting the global timezone logic.

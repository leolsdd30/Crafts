# Root: composer.json

## Idea & Main Objective
The `composer.json` file is the dependency manager configuration for PHP.

## Purpose & Role
Tells Composer which third-party packages to install into `/vendor` and configures modern PSR-4 class autoloading.

## Required Code & Logic
- Requires `vlucas/phpdotenv` (for `.env` reading).
- Requires `stripe/stripe-php` and `twilio/sdk`.
- Sets up an `autoload` block mapping the `App\` namespace to the `app/` directory so we don't have to manually `require_once` our classes.

# View: Homeowner Settings

## Idea & Main Objective
The `settings.php` view is where the homeowner manages their account details.

## Purpose & Role
Allows updating of passwords, default addresses, and viewing saved payment methods (via Stripe).

## Required Code & Logic
- Form to update the `users` table email/password securely.
- "Delete My Account" button to ensure GDPR/Privacy compliance.
- A section listing attached credit cards (using Stripe Elements).

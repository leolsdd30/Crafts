# Action: ProcessPayment

## Idea & Main Objective
The `ProcessPayment.php` action class contains the isolated business logic for moving money via Stripe.

## Purpose & Role
By keeping this logic in an "Action" rather than in a View or router, it can be tested independently and reused (e.g., for depositing funds vs paying an invoice).

## Required Code & Logic
- A single `execute()` method that takes `user_id`, `booking_id`, and `stripe_token`.
- Logic to communicate with `Stripe.php` service.
- Logic to create a `Transaction` record marked as "Held" (Escrow).
- On success, returns a success object so the Controller can redirect the user to a "Thank You" or fake receipt page.
- Throws specific exceptions (e.g., `CardDeclinedException`) to be caught by the frontend.

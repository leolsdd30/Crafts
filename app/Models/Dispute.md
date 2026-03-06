# Model: Dispute

## Idea & Main Objective
The `Dispute.php` model tracks issues raised by users against each other (e.g., no-shows, bad quality, fake profiles).

## Purpose & Role
Provides the Admin team with a queue of actionable items to resolve trust and safety issues on the platform.

## Required Code & Logic
- Properties: `id`, `reported_by_id`, `reported_user_id`, `booking_id` (optional), `reason`, `admin_notes`, `status` (Open, Resolving, Closed).
- Logic to lock funds in Escrow (via the `Transaction` model) if a dispute is opened on an active booking.

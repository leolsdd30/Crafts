# View: Admin Disputes

## Idea & Main Objective
The `disputes.php` view allows Admins to resolve conflicts between Homeowners and Craftsmen.

## Purpose & Role
Ensures disputes (e.g., "Plumber never showed up") are handled quickly and escrowed funds are unlocked safely.

## Required Code & Logic
- A dashboard queue of all `Dispute` records with 'Open' status.
- UI to read both sides of the story (messages, booking details).
- Buttons to "Refund Homeowner" or "Release to Craftsman".

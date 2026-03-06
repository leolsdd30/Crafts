# Model: Transaction

## Idea & Main Objective
The `Transaction.php` model is the absolute ledger of all monetary movements on the platform.

## Purpose & Role
Handles the Escrow system, tracking homeowner deposits, platform commissions, and craftsman payouts via Stripe.

## Required Code & Logic
- Properties: `id`, `booking_id`, `stripe_charge_id`, `total_amount`, `platform_fee`, `craftsman_payout`, `status` (Held, Released, Refunded).
- Immutable record design: Transactions should be insert-only for audit trail purposes.
- Methods to calculate the standard platform fee percentage.

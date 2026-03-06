# Service: Stripe (Mock)

## Idea & Main Objective
The `Stripe.php` class is a mock implementation of a payment gateway for this university project, completely bypassing the real Stripe API.

## Purpose & Role
Abstracts the complexity of monetary tasks. It mimics real-world behavior internally so that the front-end flow works, but no real money is transacted.

## Required Code & Logic
- Instead of using real API keys, the service should log operations and return mock success objects.
- `createPaymentIntent($amount, $currency = 'USD')`: Simulates preparing the escrow hold on a homeowner's card by returning a fake `$pi_12345` intent object. Logs the action.
- `transferToConnectAccount($craftsman_stripe_id, $amount)`: Simulates payout to the worker after platform commission. Logs the payout details for debugging/presentation.

# View: Public Checkout

## Idea & Main Objective
The `checkout.php` view is the final step where a homeowner agrees to hire a craftsman and pays a deposit.

## Purpose & Role
Secures the transaction and captures the financial consent required to update a booking to "Hired".

## Required Code & Logic
- A summary snippet of the service requested and quoted price.
- Integration of Stripe Elements JS library to collect credit card info securely (never hitting our PHP server directly).
- A form submitting the secure Stripe Token to the `ProcessPayment.php` action.

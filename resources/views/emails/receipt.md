# Email: Receipt

## Idea & Main Objective
The `receipt.php` view is an HTML file intended solely to be sent via email.

## Purpose & Role
Provides the homeowner with a legal proof of transaction after a job is successfully paid for.

## Required Code & Logic
- Must use heavily inlined CSS (because email clients usually strip `<style>` blocks or Tailwind classes).
- Displays line items for `$amount`, `$date`, `$craftsman_name`, and `$invoice_number`.

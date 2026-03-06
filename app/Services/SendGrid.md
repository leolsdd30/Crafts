# Service: SendGrid (Mock)

## Idea & Main Objective
The `SendGrid.php` class mocks the transactional email sending functionality.

## Purpose & Role
Mimics the delivery of transactional emails (receipts, booking confirmations, password resets) to keep the app flow complete without needing a real third-party provider or paid plan. 

## Required Code & Logic
- `sendEmail($to_email, $subject, $html_body)` method successfully resolves without hitting a real API.
- Recommends using a simple file-based logger, or external local tools like Mailpit/Mailhog during local development to capture and review these outgoing emails visually.
- Keeps the original method structure so if the platform ever launches in the real world, you just swap out the mockup code for the real library and set your real API keys.

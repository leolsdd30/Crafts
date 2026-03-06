# Notification: Email

## Idea & Main Objective
The `Email.php` class formats specific email messages before dispatching them via `SendGrid.php`.

## Purpose & Role
Acts as the controller that knows what an email should *say*, translating database records into beautiful HTML emails.

## Required Code & Logic
- `sendBookingConfirmation(Booking $booking)` method.
- `sendWelcomeMessage(User $user)` method.
- Pulls HTML templates from `resources/views/emails` and injects dynamic data into them.

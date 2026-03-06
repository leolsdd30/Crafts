# Action: UpdateBookingStatus

## Idea & Main Objective
The `UpdateBookingStatus.php` action runs the Booking State Machine rules.

## Purpose & Role
Ensures that a booking cannot jump from "Requested" directly to "Paid" without going through "Hired" and "Completed".

## Required Code & Logic
- `execute($booking_id, $new_status, $user_role)` method.
- Strict validation rules (e.g., Only a Craftsman can move it to "Quoted". Only a Homeowner can move it to "Hired").
- Triggers notifications (e.g., an SMS via `Twilio` to the homeowner when the status hits "Completed").

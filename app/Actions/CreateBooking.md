# Action: CreateBooking

## Idea & Main Objective
The `CreateBooking.php` action acts as the single point of entry for a Homeowner requesting a Craftsman.

## Purpose & Role
To safely validate incoming data and initialize the Booking State Machine at the "Requested" state.

## Required Code & Logic
- An `execute(array $data)` method.
- Validation logic to ensure the requested date is in the future and the craftsman actually offers the requested service.
- Database insert into the `requests_bookings` table.
- Trigger an SMS/Email notification (via the `Notifications` directory) to the Craftsman alerting them of a new lead.

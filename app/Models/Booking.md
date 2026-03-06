# Model: Booking

## Idea & Main Objective
The `Booking.php` model is the core transaction record that binds a Homeowner and a Craftsman together for a specific job.

## Purpose & Role
Acts as the central entity for the "State Machine", tracking the lifecycle of a request from start to finish.

## Required Code & Logic
- Properties: `id`, `homeowner_id`, `craftsman_id`, `description`, `scheduled_date`, `quoted_price`, `status`.
- Defined constants for the state machine: `STATUS_REQUESTED`, `STATUS_QUOTED`, `STATUS_HIRED`, `STATUS_COMPLETED`, `STATUS_CANCELLED`.
- Methods to check current status (e.g., `isCompleted()`) and relationship links to `Transaction` and `Review`.

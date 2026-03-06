# Model: Review

## Idea & Main Objective
The `Review.php` model structure is responsible for storing and managing feedback given by a Homeowner to a Craftsman after a job is completed.

## Purpose & Role
Essential for the Trust & Verification system. It calculates the overall rating of craftsmen and stores written feedback.

## Required Code & Logic
- Properties: `booking_id`, `homeowner_user_id`, `craftsman_user_id`, `star_rating` (1-5), `comment`, `created_at`.
- Validation logic to ensure a review is only written for a *Completed* booking.
- A trigger or helper method to update the aggregate rating on the `Craftsman` profile whenever a new review is saved.

# Model: Message

## Idea & Main Objective
The `Message.php` model stores individual chat bubbles sent between Homeowners and Craftsmen regarding a specific booking.

## Purpose & Role
Powers the real-time communication system, ensuring all talk happens on-platform for safety and dispute resolution.

## Required Code & Logic
- Properties: `id`, `booking_id`, `sender_id`, `body`, `read_at`, `created_at`.
- Relationship tying it to a specific `Booking` (context of the conversation).
- Method to mark a message as read (`markAsRead()`).

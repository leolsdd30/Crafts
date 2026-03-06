# View: Craftsman Schedule

## Idea & Main Objective
The `schedule.php` view acts as a calendar management tool for the worker.

## Purpose & Role
Allows them to block out dates they are unavailable, or see the full calendar of their "Hired" and "In Progress" jobs.

## Required Code & Logic
- Integrating a Javascript calendar library (like FullCalendar or a custom Alpine.js component).
- Displaying blocks of time pulled from the `Booking` model.
- Forms to mark specific days as "Off".

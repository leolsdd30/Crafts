# View: Homeowner Dashboard

## Idea & Main Objective
The `dashboard.php` inside `/views/homeowner` acts as the command center for a homeowner's hiring needs.

## Purpose & Role
Provides a clear view of their current active repairs, pending quotes they need to approve, and past histories.

## Required Code & Logic
- A tabbed interface (using Alpine.js) showing "Active Jobs", "Pending Quotes", and "Past Jobs".
- Action buttons to "Accept Quote & Pay Deposit", or "Mark Job as Complete".
- "Write a Review" prompt for any job recently marked as Complete but lacking a related `Review` record.

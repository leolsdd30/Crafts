# View: Public Craftsman Profile

## Idea & Main Objective
The `profile.php` view serves as the public-facing resume for a specific craftsman.

## Purpose & Role
Convinces a homeowner to click "Request a Quote". Must load fast and look incredibly professional.

## Required Code & Logic
- Displays data from `User` and `Craftsman` models.
- A "Portfolio" masonry grid displaying images from `/public/uploads`.
- A list of standard `Review` models attached to this worker.
- A sticky "Book Now" CTA that passes the `craftsman_id` to the checkout flow.

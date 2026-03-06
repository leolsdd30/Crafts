# Model: Craftsman

## Idea & Main Objective
The `Craftsman.php` model represents the extended profile details of a worker, linked to their core `User` record.

## Purpose & Role
Handles everything specific to the craftsmen side of the marketplace: what they do, where they are, and how much they charge.

## Required Code & Logic
- Properties matching `craftsmen_profiles`: `user_id`, `service_category`, `hourly_rate`, `latitude`, `longitude`, `json_metadata`.
- Geospatial logic methods (e.g., `getDistanceTo($lat, $lng)`) or scope queries for finding nearby workers.
- JSON parsing methods to easily retrieve and save specific tool skills or certifications from the `json_metadata` column.
- Relationship methods connecting back to `User`, and outward to `Review` and `Booking`.

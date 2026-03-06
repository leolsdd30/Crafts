# Database: Migrations

## Idea & Main Objective
The `Migrations.php` script handles table creation and schema updates.

## Purpose & Role
Instead of manually typing SQL in PHPMyAdmin, this script ensures every developer has the exact same database structure.

## Required Code & Logic
- `up()` and `down()` methods.
- Logic to establish `CREATE TABLE IF NOT EXISTS` commands for `users`, `craftsmen_profiles`, `requests_bookings`, etc.
- Logic to add advanced Foreign Key Constraints so that if a `User` is deleted, their `Booking` records are handled correctly (Cascade vs Null).

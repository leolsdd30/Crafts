# Model: JobPosting

## Idea & Main Objective
The `JobPosting.php` model acts as the database abstraction for public requests made by Homeowners to the entire Craftsmen community.

## Purpose & Role
Provides the data interface for the `job_postings` table.

## Required Code & Logic
- Extends the core `Model` class.
- Methods to pull active jobs: `getOpenJobsByCategory($category)` or `getAllOpenJobs()`.
- Relationship methods: `getHomeowner()`, `getQuotes()` (returns an array of `JobQuote` models).
- Helper methods: `assignToQuote($quote_id)` (Handles the logic of changing status to 'assigned' and triggering the creation of a `requests_bookings` entry).

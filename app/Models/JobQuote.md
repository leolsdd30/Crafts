# Model: JobQuote

## Idea & Main Objective
The `JobQuote.php` model represents a Craftsman's bid on a specific `JobPosting`.

## Purpose & Role
Provides the data interface for the `job_quotes` table.

## Required Code & Logic
- Extends the core `Model` class.
- Validation logic before inserting: Ensure the Craftsman hasn't *already* quoted this specific `job_posting_id` (so they don't spam the homeowner).
- Relationship methods: `getJobPosting()`, `getCraftsman()`.

# Controller: JobBoard

## Idea & Main Objective
The `JobBoardController.php` manages the views and actions related to the public marketplace of tasks.

## Purpose & Role
Handles the HTTP requests for viewing the board, posting a job, and submitting a quote.

## Required Code & Logic
- Extends the base `Controller` class.
- Method: `index()`
  - Fetches all open `Jobpostings` and loads `$this->view('jobboard/index', $jobs);` (Visible to Craftsmen).
- Method: `create()`
  - Shows the form for a Homeowner to post a job.
- Method: `store()`
  - Validates `$_POST` and inserts a new `JobPosting`.
- Method: `show($id)`
  - Shows the details of a single job. If the viewer is a Craftsman, shows the "Submit Quote" form. If the viewer is the Homeowner, shows the list of quotes received so far.
- Method: `submitQuote($job_posting_id)`
  - Validates and saves a `JobQuote` from a Craftsman.
- Method: `acceptQuote($quote_id)`
  - Called by the Homeowner. Triggers the Model logic to accept the quote and transition the job to an active Booking.

# Action: Publish a Job

## Idea & Main Objective
Allows a User (usually a Homeowner, but can be a Craftsman acting as a General Contractor) to create a public request on the Job Board so that Craftsmen can discover it and submit competitive bids.

## Flow & Logic
1.  **Authorization:** Ensure the user is logged in.
2.  **Input:** The user submits a form via `POST /job-board/create`. The input includes:
    *   `title`
    *   `description`
    *   `service_category` (e.g., Plumbing, Electrical, Cleaning)
    *   `budget_range` (Optional, e.g., "$500 - $1000")
    *   `address` (Text string of the job location)
3.  **Validation:** Ensure all required fields are present and not empty.
4.  **Database Insert:**
    *   Use the `JobPosting` model to insert a new row into the `job_postings` table.
    *   `posted_by_user_id` is set to the currently logged-in user `$_SESSION['user_id']`.
    *   `status` defaults to 'open'.
5.  **Redirect:** After successful insertion, redirect the user to their "My Posted Jobs" view (or `manage_bids.md` view).

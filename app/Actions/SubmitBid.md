# Action: Submit a Bid (Quote)

## Idea & Main Objective
Allows a verified Craftsman to browse public `job_postings` and submit a proposed price and message to the Homeowner.

## Flow & Logic
1.  **Authorization:** Ensure the user is logged in AND has a record in `craftsmen_profiles`.
2.  **Validation (Crucial):**
    *   The Craftsman cannot bid on a job they posted themselves (`job_postings.posted_by_user_id != $_SESSION['user_id']`).
    *   The Craftsman hasn't *already* submitted a pending quote for this specific `job_posting_id` (prevent spam).
3.  **Input:** The Craftsman submits a form via `POST /job-board/{job_id}/quote`. The input includes:
    *   `quoted_price` (Decimal validation required)
    *   `cover_message` (Text explaining why they fit the job)
4.  **Database Insert:**
    *   Use the `JobQuote` model to insert a new row into the `job_quotes` table.
    *   `craftsman_id` is set to `$_SESSION['user_id']`.
    *   `status` defaults to 'pending'.
5.  **Redirect:** Redirect back to the Job Board or a "My Bids" dashboard with a success message.

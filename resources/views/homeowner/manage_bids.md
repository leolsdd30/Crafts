# View Blueprint: Manage Bids (Homeowner Output)

## Idea & Main Objective
A private dashboard (`GET /my-jobs/{job_id}`) where the Homeowner who posted a job can review all the quotes/bids submitted by various Craftsmen and choose who to hire.

## Expected Variables 
The Controller must pass two variables to this view:
1.  `$job`: The specific `job_postings` record being viewed.
2.  `$quotes`: An array of `job_quotes` rows joined with `users` and `craftsmen_profiles` data (to show the craftsmen's names, ratings, and hourly rates).

## Required HTML/UI Elements
-   **Job Header:** Displays the original `$job->title` and `$job->description` so the Homeowner remembers what they asked for.
-   **Quotes List (Loop):** A `foreach` loop over `$quotes`. Each card must show:
    -   Craftsman's Name and Profile Picture (`users` table).
    -   Craftsman's verification badge (`craftsmen_profiles` table).
    -   The specific `$quote->quoted_price`.
    -   The `$quote->cover_message`.
    -   **"Hire This Craftsman" Button:** A highly visible `POST` action form.
-   **Action logic on "Hire":**
    If the Homeowner clicks "Hire", a `POST` request hits the Controller. The Controller must then:
    1. Update the chosen `job_quotes` row to `status = 'accepted'`.
    2. Update all *other* `job_quotes` for this job to `status = 'rejected'`.
    3. Update the `job_postings` status to `status = 'assigned'`.
    4. **Crucial Step:** Automatically generate a new `requests_bookings` row officially starting the contract between the homeowner and the accepted craftsman.

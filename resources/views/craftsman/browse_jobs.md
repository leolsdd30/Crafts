# View Blueprint: Browse Open Jobs

## Idea & Main Objective
A public feed (`GET /job-board`) specifically serving Craftsmen looking for new leads and potential work in their area/category.

## Expected Variables 
The `JobBoardController` must pass a `$jobs` array to this view. This array should contain all `job_postings` where `status = 'open'`.

## Required HTML/UI Elements
-   **Search/Filter Bar:** Dropdowns to filter the `$jobs` by `service_category` (e.g., only show 'Plumbing' jobs).
-   **Job Feed (Loop):** A `foreach` loop iterating over `$jobs`. Each item displays:
    -   `title`
    -   `service_category` tag
    -   `budget_range`
    -   A heavily truncated snippet of the `description`.
    -   The `address` (or just the city/neighborhood)
    -   A clear "View Details & Bid" button leading to `GET /job-board/{id}`.
-   **Empty State:** If `$jobs` is empty, show a message like "No open jobs in this category right now."

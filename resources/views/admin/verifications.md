# View: Admin Verifications

## Idea & Main Objective
The `verifications.php` view is the queue where Admins review Craftsman ID and License uploads.

## Purpose & Role
Essential for the Trust & Verification process to prevent fake craftsmen from appearing in the search results.

## Required Code & Logic
- A data table powered by Tailwind showing pending `craftsman_profiles` records.
- "View Documents" modal or inline expansion.
- "Approve" and "Reject" buttons that submit via POST to an Admin Action, updating the craftsman's status.

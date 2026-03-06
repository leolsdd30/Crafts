# Database Schema: Job Quotes

## Idea & Main Objective
The `job_quotes` table stores the individual "bids" that Craftsmen submit in response to public `job_postings`.

## Proposed SQL Schema
```sql
CREATE TABLE job_quotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_posting_id INT NOT NULL,
    craftsman_id INT NOT NULL,
    quoted_price DECIMAL(10, 2) NOT NULL,
    cover_message TEXT NULL,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (job_posting_id) REFERENCES job_postings(id) ON DELETE CASCADE,
    FOREIGN KEY (craftsman_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- Multiple craftsmen can submit quotes for a single `job_posting`.
- When a Homeowner 'accepts' a quote, that quote's status changes to 'accepted', all other quotes for that posting are 'rejected', the `job_postings` status becomes 'assigned', and a new formal `requests_bookings` transaction begins.

# Database Schema: Job Postings

## Idea & Main Objective
The `job_postings` table acts as a public "Job Board" where Homeowners can publish a request, allowing Craftsmen to browse and submit bids rather than the Homeowner searching for a specific Craftsman.

## Proposed SQL Schema
```sql
CREATE TABLE job_postings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    posted_by_user_id INT NOT NULL, -- Changed from homeowner_id to allow Craftsmen to subcontract
    service_category VARCHAR(100) NOT NULL, -- e.g., 'Plumbing', 'Electrical'
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    address TEXT NOT NULL,
    budget_range VARCHAR(100) NULL, -- e.g., '$100 - $300'
    status ENUM('open', 'assigned', 'completed', 'cancelled') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (posted_by_user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- `posted_by_user_id`: By linking this directly to `users.id` rather than strictly enforcing a homeowner role, a Craftsman (e.g., a General Contractor) can post a job to hire another Craftsman (e.g., an Electrician) as a sub-contractor.
- This is completely separate from a Craftsman's public profile page. Users can still browse `craftsmen_profiles` and request a booking directly, OR they can post here and let the Craftsmen come to them.
- When `status` changes to 'assigned', the system automatically creates a record in `requests_bookings`.

# Database Schema: Requests & Bookings

## Idea & Main Objective
The `requests_bookings` table is the state-machine transactional record linking a homeowner needing work with a craftsman providing it.

## Proposed SQL Schema
```sql
CREATE TABLE requests_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    homeowner_id INT NOT NULL,
    craftsman_id INT NOT NULL,  
    description TEXT NOT NULL,
    address TEXT NOT NULL, 
    scheduled_date DATETIME NOT NULL,
    quoted_price DECIMAL(10, 2) NULL,
    status ENUM('requested', 'quoted', 'hired', 'completed', 'cancelled') DEFAULT 'requested',
    completion_date DATETIME NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (homeowner_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (craftsman_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- Application logic MUST verify the `craftsman_id` actually has a corresponding record in `craftsmen_profiles`, even though the foreign key links to `users` for easier joining.
- `address`: The physical location the craftsman must travel to.
- `completion_date`: Null until the status reaches `completed`. Useful for calculating when to prompt the homeowner for a review.

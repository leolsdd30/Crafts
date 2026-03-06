# Database Schema: Reviews

## Idea & Main Objective
The `reviews` table powers the fundamental trust mechanism of the platform, storing the written feedback and star rating left by the homeowner for the craftsman.

## Proposed SQL Schema
```sql
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL UNIQUE, 
    homeowner_id INT NOT NULL,
    craftsman_id INT NOT NULL,
    star_rating INT NOT NULL CHECK (star_rating >= 1 AND star_rating <= 5),
    comment TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES requests_bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (homeowner_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (craftsman_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- Extremely strict referential integrity.
- Can only be created once the corresponding `booking` status is `completed`.
- A trigger or PHP service should automatically update an aggregate average rating on the `craftsmen_profiles` table whenever a new review is inserted.

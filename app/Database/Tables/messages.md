# Database Schema: Messages

## Idea & Main Objective
The `messages` table handles direct, real-time-style communication between users regarding a specific job.

## Proposed SQL Schema
```sql
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message_body TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES requests_bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- **CRITICAL SECURITY NOTE**: The application code handling message insertion MUST validate that the `sender_id` and `receiver_id` are the actual `homeowner_id` and `craftsman_id` associated with that specific `booking_id`. Users cannot message each other about bookings they are not involved in.

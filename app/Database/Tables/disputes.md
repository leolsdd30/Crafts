# Database Schema: Disputes

## Idea & Main Objective
The `disputes` table provides a mechanism for conflict resolution when a homeowner is unsatisfied with the work provided by a craftsman.

## Proposed SQL Schema
```sql
CREATE TABLE disputes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL UNIQUE,
    raised_by_user_id INT NOT NULL,
    reason TEXT NOT NULL,
    status ENUM('open', 'investigating', 'resolved_refund', 'resolved_payout') DEFAULT 'open',
    admin_notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES requests_bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (raised_by_user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- Can only be raised on a booking that was previously marked `hired` or `completed`.
- Automatically halts any pending transactions to the Craftsman's connect account.

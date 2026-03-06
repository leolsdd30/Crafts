# Database Schema: Invoices

## Idea & Main Objective
The `invoices` table tracks the financial requests tied to a completed booking.

## Proposed SQL Schema
```sql
CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL UNIQUE,
    amount_due DECIMAL(10, 2) NOT NULL,
    status ENUM('draft', 'sent', 'paid', 'overdue') DEFAULT 'draft',
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES requests_bookings(id) ON DELETE CASCADE
);
```

## Key Notes
- `booking_id` is unique, implying a 1-to-1 relationship. One job = One final invoice.
- `amount_due` is generated based on the `requests_bookings`.`quoted_price` or a final adjustment.

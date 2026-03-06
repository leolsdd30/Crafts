# Database Schema: Transactions

## Idea & Main Objective
The `transactions` table tracks the actual payment attempts (successes and failures) made against an Invoice.

## Proposed SQL Schema
```sql
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NOT NULL,
    stripe_charge_id VARCHAR(255) NULL, 
    amount_paid DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'succeeded', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE
);
```

## Key Notes
- A single invoice *can* have multiple transactions if the first one fails (e.g., declined card) and the user has to try again.
- `stripe_charge_id` stores the reference from the Mock Stripe Service.

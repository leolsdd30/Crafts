# Database Schema: Users

## Idea & Main Objective
The `users` table is the core identity repository for every individual who accesses the platform.

## Proposed SQL Schema
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('homeowner', 'craftsman', 'admin') DEFAULT 'homeowner',
    phone_number VARCHAR(20) NULL,
    profile_picture VARCHAR(255) DEFAULT 'default.png',
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Key Notes
- `profile_picture`: Stores the filename resulting from the `ProcessUploads` action.
- `is_active`: Used for soft-deleting or banning users without breaking referential integrity on past invoices or bookings.

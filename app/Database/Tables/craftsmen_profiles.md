# Database Schema: Craftsmen Profiles

## Idea & Main Objective
The `craftsmen_profiles` table stores the extended, professional data for users who operate as workers on the platform.

## Proposed SQL Schema
```sql
CREATE TABLE craftsmen_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE,
    service_category VARCHAR(100) NOT NULL,
    hourly_rate DECIMAL(10, 2) NOT NULL,
    is_verified BOOLEAN DEFAULT FALSE,
    portfolio_images JSON NULL,
    latitude DECIMAL(10, 8) NULL,
    longitude DECIMAL(11, 8) NULL,
    bio TEXT NULL,
    json_metadata JSON NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Key Notes
- `is_verified`: An crucial admin trust signal. A worker should perhaps not show up in public search until an admin toggles this to `TRUE`.
- `portfolio_images`: An array (stored as JSON) of upload filenames to showcase past work.
- `json_metadata`: Flexible storage for licenses, specific tools, or operating hours.

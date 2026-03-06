# Core: Model

## Idea & Main Objective
The `Model.php` is the base class that all database-connected objects (e.g., `User`, `Booking`) will extend.

## Purpose & Role
Provides a central place to hold the active database connection, so that individual models don't have to keep re-connecting to the database manually. It also provides basic CRUD scaffolding if needed.

## Required Code & Logic
- Property: `protected $db;` (Holds the PDO instance).
- Constructor: Automatically grabs the global PDO connection (established in `app/Database/init.php`) and assigns it to `$this->db`.
- (Optional but recommended) Helper methods like `query($sql, $params)` to make running prepared statements cleaner inside the child models.

# Database: Init

## Idea & Main Objective
The `init.php` file defines the central PDO connection instance used by the whole application.

## Purpose & Role
Provides a secure and robust way to talk to the MySQL database without repeating the connection logic.

## Required Code & Logic
- Pulls credentials from the environment config (to keep passwords out of the code).
- Instantiates a new `PDO` object.
- Sets PDO Error Mode to Exception (`PDO::ERRMODE_EXCEPTION`) so database failures crash loudly rather than failing silently.
- Sets default fetch mode to Associative Arrays (`PDO::FETCH_ASSOC`).

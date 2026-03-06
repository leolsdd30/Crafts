# Config: database

## Idea & Main Objective
The `database.php` file returns an array of database connection settings.

## Purpose & Role
Provides an easy place to define multiple connections (e.g. SQLite for testing, MySQL for local XAMPP, PostgreSQL for production).

## Required Code & Logic
- Returns an array pulling directly from `$_ENV`.
- E.g. `'host' => $_ENV['DB_HOST'] ?? '127.0.0.1'`, `'port' => $_ENV['DB_PORT'] ?? '3306'`.

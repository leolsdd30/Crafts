# Model: User

## Idea & Main Objective
The `User.php` model acts as the central identity entity for the entire platform. Every person logging in (whether homeowner, craftsman, or admin) has an underlying User record.

## Purpose & Role
Provides the foundational data definition for authentication, session tracking, and role-based access control (RBAC).

## Required Code & Logic
- Property declarations matching the `users` table columns (`id`, `email`, `password`, `role`, `created_at`).
- Role-checking helper methods (e.g., `isCraftsman()`, `isAdmin()`).
- Relational getters (e.g., a method to fetch related `Craftsman` profile if the user's role is 'craftsman').
- Security validations for data assignment to prevent mass-assignment vulnerabilities.

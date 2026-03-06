# View: Admin Dashboard

## Idea & Main Objective
The `dashboard.php` file inside `/views/admin` is the high-level overview for platform administrators.

## Purpose & Role
Provides key metrics at a glance (Total users, active bookings, weekly revenue, pending verifications).

## Required Code & Logic
- HTML/Tailwind layout using the `admin` layout wrapper.
- PHP logic to loop through and display aggregated statistics passed from the Controller/Action.
- Quick links to `/admin/verifications` and `/admin/disputes`.

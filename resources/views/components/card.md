# Component: Card

## Idea & Main Objective
The `card.php` component renders a single craftsman in search results or dashboards.

## Purpose & Role
The single most reused visual element. It must look premium.

## Required Code & Logic
- Receives a `$craftsman` model object.
- Extracts `name`, `hourly_rate`, `rating`, and `profile_image`.
- Formats them cleanly into a Tailwind grid with hover effects (`hover:shadow-lg transition`).

# Component: Button

## Idea & Main Objective
The `button.php` component standardizes CTA elements across the platform.

## Purpose & Role
Ensures that a "Primary" action looks identical on the Homepage and the Dashboard.

## Required Code & Logic
- Receives variables like `$text`, `$type (primary/secondary/danger)`, and `$href`.
- Outputs a `<button>` or `<a>` tag with predefined, long Tailwind strings so the developer just types `include('button', ['type' => 'primary'])`.
